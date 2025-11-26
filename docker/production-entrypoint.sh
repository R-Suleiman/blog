#!/bin/sh
set -e

# Start Nginx + PHP-FPM immediately (Render needs a port open NOW)
echo "Starting Nginx + PHP-FPM on port \${PORT:-8080} ..."
/usr/bin/supervisord -c /etc/supervisor/conf.d/supervisor.conf &

# Now wait for DB and run migrations in the foreground
echo "Waiting for database..."
until php -r "
    \$dsn = getenv('DB_CONNECTION') === 'mysql'
        ? 'mysql:host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT') . ';dbname=' . getenv('DB_DATABASE')
        : 'pgsql:host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT') . ';dbname=' . getenv('DB_DATABASE');
    new PDO(\$dsn, getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
    exit(0);
" >/dev/null 2>&1; do
    echo "Database not ready - sleeping..."
    sleep 3
done

echo "Database ready! Running migrations..."
php artisan migrate --force

echo "Optimizing Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

echo "Laravel is ready and serving on port \${PORT:-8080}"
# Keep container alive (supervisord is already running)
wait  # wait for background processes
