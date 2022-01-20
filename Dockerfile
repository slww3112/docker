FROM php:8.0-apache as base
RUN docker-php-ext-install mysqli

COPY ./challenge3 /var/www/html
EXPOSE 80