# Use PHP-FPM Alpine image
FROM php:fpm-alpine3.19

# Set working directory
WORKDIR /app

# Install PHP extensions and other dependencies
RUN apk --no-cache add \
    bash \
    git \
    libjpeg-turbo-dev \
    libpng-dev \
    libzip-dev \
    linux-headers \
    zip \
    unzip \
    zlib-dev \
    libxml2-dev \
    icu-dev \
    libxslt-dev \
    g++ \
    make \
    autoconf 

RUN docker-php-ext-install -j$(nproc) gd pdo pdo_mysql zip intl soap xsl opcache

# XDebug
COPY docker/php/fpm/etc/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
RUN pecl install xdebug-3.3.1
RUN docker-php-ext-enable xdebug

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy files
COPY . /app/

# Set permissions
RUN chown -R 1000:1000 /app

USER 1000:1000

#Install Symfony dependencies
ENV COMPOSER_CACHE_DIR=/app/.composer/cache
RUN composer install --no-scripts --optimize-autoloader

# Start PHP-FPM
CMD php-fpm