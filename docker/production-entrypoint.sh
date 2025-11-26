#!/bin/sh
set -e

# Wait for database (Render gives us DATABASE_URL or separate vars)
echo "Waiting for database..."
until php -r "
    \$dsn = getenv('DB_CONNECTION') === 'mysql'
        ? 'mysql:host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT') . ';dbname=' . getenv('DB_DATABASE')
        : 'pgsql:host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT') . ';dbname=' . getenv('DB_DATABASE');
    new PDO(\$dsn, getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
    echo 'DB ready\n';
" > /dev/null 2>&1; do
    sleep 2
done

# Run migrations + cache everything
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

exec "$@"
