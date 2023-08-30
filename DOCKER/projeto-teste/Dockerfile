FROM php:8.2.7-fpm-alpine

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/storage/logs
RUN apk --no-cache add postgresql-dev
RUN docker-php-ext-install pdo pdo_pgsql
RUN apk add --no-cache zip libzip-dev libpng-dev
RUN docker-php-ext-install zip
RUN docker-php-ext-install gd
