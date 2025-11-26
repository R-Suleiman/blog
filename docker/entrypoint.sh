#!/bin/bash

set -e

# Install composer deps if missing
if [ ! -f vendor/autoload.php ]; then
    echo "Running composer install..."
    composer install --optimize-autoloader
fi

# Ensure env exists
if [ ! -f .env ]; then
    echo "Creating .env file..."
    cp .env.example .env
    php artisan key:generate
fi

# Load .env variables into bash (required for the wait loop)
if [ -f .env ]; then
    set -a  # Export all variables
    source .env
    set +a
fi

# Wait for MySQL to be ready
echo "Waiting for database connection..."
until php -r "try { new PDO('mysql:host=${DB_HOST};port=${DB_PORT}', '${DB_USERNAME}', '${DB_PASSWORD}'); echo 'Connected'; exit(0); } catch (PDOException \$e) { exit(1); }" > /dev/null 2>&1; do
    echo "Database not ready yet - sleeping..."
    sleep 1
done
echo "Database is ready!"

# Run database migrations (remove || true to fail on error if desired)
php artisan migrate --force

# Start Laravel's built-in server
echo "Starting Laravel server on port $PORT..."
php artisan serve --host=0.0.0.0 --port=$PORT
