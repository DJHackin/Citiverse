# syntax=docker/dockerfile:1
FROM php:8.3-apache

COPY ./public/ /var/www/html/
COPY askai.php /var/www/html/

RUN apt-get update && apt-get upgrade -y && apt-get install -y curl