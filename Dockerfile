# ============= STAGE 1: Build assets =============
FROM node:20-alpine AS vite
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY . .
RUN npm run build

# ============= STAGE 2: PHP dependencies & app (locked to PHP 8.2) =============
FROM composer/composer:2.2-bin AS composer-bin

FROM php:8.2-cli-alpine AS composer

# Install system dependencies needed for extensions
RUN apk add --no-cache git unzip libzip-dev oniguruma-dev libpng-dev libjpeg-turbo-dev freetype-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) zip mbstring pdo_mysql gd bcmath

# Copy only the composer binary from the official image
COPY --from=composer-bin /composer /usr/local/bin/composer

WORKDIR /app

# Copy only composer files first (better caching)
COPY composer.json composer.lock ./

# Install dependencies (now runs on real PHP 8.2 + compatible extensions)
RUN composer install \
    --optimize-autoloader \
    --no-dev \
    --no-interaction \
    --no-progress \
    --no-scripts \
    --ignore-platform-req=php   # safe fallback, can remove later

# Now copy the rest of the code
COPY . .

# Copy built assets from Vite stage
COPY --from=vite /app/public/build ./public/build

# Re-run with scripts now that full app is present
RUN composer dump-autoload --optimize

# ============= STAGE 3: Final runtime image =============
FROM php:8.2-fpm-alpine

# Install nginx + supervisor + PostgreSQL driver
RUN apk add --no-cache \
    nginx \
    supervisor \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql pdo_mysql \
    && rm -rf /var/cache/apk/*

# Copy configs
COPY nginx/default.conf /etc/nginx/http.d/default.conf
COPY docker/supervisor.conf /etc/supervisor/conf.d/supervisor.conf

# Copy app from composer stage
COPY --from=composer /app /var/www/html

# Permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Copy entrypoint
COPY docker/production-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/production-entrypoint.sh

EXPOSE 8080
ENTRYPOINT ["production-entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisor.conf"]
