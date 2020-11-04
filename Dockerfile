FROM php:7.3-apache
RUN apt-get update
RUN a2enmod rewrite
COPY . /var/www/html/
EXPOSE 80
