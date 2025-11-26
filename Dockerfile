# ============= STAGE 1: Build assets =============
FROM node:20-alpine AS vite
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY . .
RUN npm run build

# ============= STAGE 2: PHP dependencies & app (PHP 8.2) =============
FROM composer:2.2 AS composer

# Pin to PHP 8.2 explicitly (composer:2.2 is still on 8.2, composer:2 is now 8.5)
# Or use the official php:8.2-cli image with composer installed manually
# This version is guaranteed to be PHP 8.2.x
FROM php:8.2-cli AS composer-base
RUN curl -sSL https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

FROM composer-base AS composer
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --optimize-autoloader --no-dev --no-interaction --no-progress --no-scripts

# Now copy the rest of the app and built assets
COPY . .
COPY --from=vite /app/public/build ./public/build

# Re-run composer dump-autoload with scripts now that full app is present
RUN composer dump-autoload --optimize

# ============= STAGE 3: Final runtime image =============
FROM php:8.2-fpm-alpine

# Install PHP extensions + nginx + supervisor (same as before)
RUN apk add --no-cache \
    nginx \
    supervisor \
    libpng-dev libjpeg-turbo-dev freetype-dev libzip-dev oniguruma-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) pdo_mysql mbstring exif pcntl bcmath gd zip \
    && rm -rf /var/cache/apk/*

# Copy php-fpm & nginx configs
COPY nginx/default.conf /etc/nginx/http.d/default.conf
COPY docker/supervisor.conf /etc/supervisor/conf.d/supervisor.conf

# Copy app from previous stages
COPY --from=composer /app /var/www/html
COPY --from=vite /app/public/build /var/www/html/public/build

# Permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Copy production entrypoint
COPY docker/production-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/production-entrypoint.sh

EXPOSE 8080
ENTRYPOINT ["production-entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisor.conf"]
