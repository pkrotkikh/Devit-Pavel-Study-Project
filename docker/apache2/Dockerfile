FROM php:8.1.5-apache

COPY ./docker/apache2/apache2.conf /etc/apache2/
COPY ./docker/apache2/vhost.conf /etc/apache2/sites-enabled/000-default.conf

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2

# Install php dependencies for laravel (commented - already exist in base image)
RUN apt-get update
RUN apt-get -y install curl
RUN apt-get -y install sudo
RUN apt-get install -y openssl
RUN docker-php-ext-install bcmath
# RUN docker-php-ext-install ctype
RUN apt install -y libxml2-dev
# RUN docker-php-ext-install dom
# RUN docker-php-ext-install fileinfo
# RUN docker-php-ext-install json
# RUN docker-php-ext-install mbstring
# RUN docker-php-ext-install pdo
# RUN docker-php-ext-install tokenizer
# RUN docker-php-ext-install xml
RUN docker-php-ext-install pdo_mysql

WORKDIR /var/www/html

