#!/bin/sh

# Ensure the database directory and file exist inside the container
mkdir -p /var/www/database
touch /var/www/database/database.sqlite
chmod -R 777 /var/www/database

# Wipe and re-run migrations to stop the "table already exists" error
php artisan migrate:fresh --force

# Boot the application up (using laravel serve as a safe container fallback)
exec php artisan serve --host=0.0.0.0 --port=80
