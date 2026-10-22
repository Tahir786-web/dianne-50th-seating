FROM php:8.3-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Generate app key if not set (optional)
# RUN php artisan key:generate

# Expose port
EXPOSE 8000

# Start Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000


COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["docker-entrypoint.sh"]



# 1. Install Node.js and NPM inside the container
RUN apt-get update && apt-get install -y ca-certificates curl gnupg && \
    mkdir -p /etc/apt/keyrings && \
    curl -fsSL https://nodesource.com | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg && \
    echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://nodesource.com nodistro main" | tee /etc/apt/sources.list.d/nodesource.list && \
    apt-get update && apt-get install nodejs -y

# 2. Set the working directory
WORKDIR /var/www

# 3. Copy package files and install front-end dependencies
COPY package*.json ./
RUN npm install

# 4. Copy the rest of your application code
COPY . .

# 5. Compile CSS and JS assets using Vite
RUN npm run build

# Ensure correct permissions for the newly generated build folder
RUN chown -R www-data:www-data /var/www/public/build
