FROM php:8.1.5-apache

COPY ./docker/apache2/apache2.conf /etc/apache2/
COPY ./docker/apache2/vhost.conf /etc/apache2/sites-enabled/000-default.conf

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2

# Install php dependencies for laravel
RUN apt-get update
RUN apt-get -y install curl
RUN apt-get -y install sudo
RUN apt-get install nano
RUN apt-get install -y openssl
RUN docker-php-ext-install bcmath
RUN apt install -y libxml2-dev
RUN docker-php-ext-install pdo_mysql
RUN sudo a2enmod rewrite

# Install composer
WORKDIR /var/www/html
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer

# Install npm
#RUN npm install
RUN apt-get update && apt-get upgrade -y && \
    apt-get install -y nodejs \
    npm
RUN npm install