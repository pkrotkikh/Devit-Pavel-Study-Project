FROM php:8.1.5-apache

COPY ./docker/apache2/apache2.conf /etc/apache2/
COPY ./docker/apache2/vhost.conf /etc/apache2/sites-enabled/000-default.conf

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2

WORKDIR /var/www/html

