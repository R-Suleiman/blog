#!/bin/sh
set -e

# Substitute PORT into nginx config (install envsubst if missing)
apk add --no-cache gettext || true
export PORT=${PORT:-8080}
envsubst '$PORT' < /etc/nginx/http.d/default.conf > /tmp/default.conf.tmp && \
    mv /tmp/default.conf.tmp /etc/nginx/http.d/default.conf || true

# Start services immediately (for Render port detection)
echo "Starting Nginx + PHP-FPM on port $PORT ..."
/usr/bin/supervisord -c /etc/supervisor/conf.d/supervisor.conf &

# Wait for DB (now with better error output)
echo "Waiting for database..."
until php -r "
    try {
        \$dsn = 'pgsql:host=' . getenv('DB_HOST') . ';port=' . (getenv('DB_PORT') ?: 5432) . ';dbname=' . getenv('DB_DATABASE');
        new PDO(\$dsn, getenv('DB_USERNAME'), getenv('DB_PASSWORD'), [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        echo 'DB connected!\n';
        exit(0);
    } catch (Exception \$e) {
        echo 'Connection failed: ' . \$e->getMessage() . '\n';
        exit(1);
    }
" 2>&1; do
    echo "Database not ready - sleeping..."
    sleep 5
done

# Run migrations EVERY TIME (safe for fresh DB; idempotent for existing)
echo "Running migrations..."
php artisan migrate:fresh --force || php artisan migrate --force

# Cache everything
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

echo "Laravel is LIVE on port $PORT"
wait  # Keep container running
