FROM php:8.4.0-apache

COPY ./public/ /var/www/html/
COPY ask.php /var/www/html/

RUN apt-get update && apt-get install -y curl