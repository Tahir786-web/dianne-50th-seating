#!/bin/sh

# Ensure the database directory and file exist inside the container
mkdir -p /var/www/database
touch /var/www/database/database.sqlite
chmod -R 777 /var/www/database

# Run migrations automatically
php artisan migrate --force

# Start the actual web server (adjust 'apache2-foreground' if you use php-fpm or Nginx)
exec php-fpm
