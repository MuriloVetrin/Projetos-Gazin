FROM php:8.2.3-apache

RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip unzip

RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd pdo pdo_mysql

WORKDIR /var/www/html

COPY . .

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80
