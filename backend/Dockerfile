FROM php:7.4.3-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN apt-get clean && rm -rf /var/lib/apt/lists/* \
    && apt-get update && apt-get install -y unzip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY . /var/www

WORKDIR /var/www

COPY Docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

RUN cp .env.example .env && \
    composer install && \
    php artisan key:generate

CMD php artisan serve --host=0.0.0.0 --port=8181

EXPOSE 8181
