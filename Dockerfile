FROM php@sha256:3b8c2e7b8b8e6c8c8c8c8c8c8c8c8c8c8c8c8c8c8c8c8c8c8c8c8c8c8c8c8c8c8c8c8c8c8c8c8c8

COPY ./public/ /var/www/html/
COPY ask.php /var/www/html/

RUN apt-get update && apt-get install -y curl