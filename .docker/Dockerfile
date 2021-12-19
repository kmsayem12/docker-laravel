FROM php:7.4.21-fpm

# Copy composer.lock and composer.json into the working directory
COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www


# Install dependencies for the operating system software

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install composer (php package manager)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Change current user to www
USER www


# RUN composer update --ignore-platform-reqs

# CMD php artisan serve --host=0.0.0.0 --port=9000

# Expose port 8181 and start php-fpm server (for FastCGI Process Manager)
EXPOSE 9000
CMD ["php-fpm"]