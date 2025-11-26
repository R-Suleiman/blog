#!/bin/sh
set -e

# Substitute PORT env var into nginx config
export PORT=${PORT:-8080}
envsubst '$PORT' < /etc/nginx/http.d/default.conf > /tmp/default.conf.tmp && \
    mv /tmp/default.conf.tmp /etc/nginx/http.d/default.conf

# Start services immediately so Render detects the port
echo "Starting Nginx + PHP-FPM on port $PORT ..."
/usr/bin/supervisord -c /etc/supervisor/conf.d/supervisor.conf &

# Now safely wait for DB and run migrations
echo "Waiting for database..."
until php -r "new PDO('mysql:host=' . getenv('DB_HOST') . ';port=' . (getenv('DB_PORT') ?: 3306) . ';dbname=' . getenv('DB_DATABASE'), getenv('DB_USERNAME'), getenv('DB_PASSWORD')); exit(0);" >/dev/null 2>&1; do
    echo "Database not ready - sleeping..."
    sleep 3
done

echo "Database ready! Running migrations..."
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

echo "Laravel is LIVE on port $PORT"
wait
