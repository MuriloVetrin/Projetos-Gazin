# Use uma imagem do PHP com o Apache
FROM php:8.2.3-apache

# Define o diretório de trabalho como o diretório padrão do Apache
WORKDIR /var/www/html

# Instala dependências necessárias
RUN apt-get update && \
    apt-get install -y libpng-dev libjpeg-dev zip unzip && \
    docker-php-ext-configure gd --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql

# Instala o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia os arquivos do projeto para o contêiner
COPY . .

# Define permissões adequadas
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Instala as dependências do Composer
RUN composer install

# Expõe a porta 80 para o servidor web
EXPOSE 80

# Comandos a serem executados ao iniciar o contêiner
CMD ["apache2-foreground"]