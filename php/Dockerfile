FROM php:8.4-apache

RUN apt-get update && apt-get install -y libpq-dev

RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN a2enmod rewrite

RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

RUN apt-get update && apt-get install -y nano


WORKDIR /var/www/html



