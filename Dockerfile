FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    sqlite3 libsqlite3-dev libzip-dev \
    libpq-dev nodejs npm

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Set permissions
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www

# Install and build Vite
RUN npm install && npm run build

# Make sure database exists
RUN mkdir -p /var/www/database && touch /var/www/database/database.sqlite

# Expose port
EXPOSE 8000

# Start Laravel app
CMD php artisan serve --host=0.0.0.0 --port=8000
