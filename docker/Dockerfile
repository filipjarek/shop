FROM php:8.1-apache

RUN apt-get update \
    &&  apt-get install -y --no-install-recommends \
    locales apt-utils git libicu-dev g++ libpng-dev libxml2-dev libzip-dev libonig-dev libxslt-dev unzip 
  
RUN curl -sS https://getcomposer.org/installer | php -- \
    &&  mv composer.phar /usr/local/bin/composer 

RUN curl -sL https://deb.nodesource.com/setup_18.x | bash \
    && apt-get install nodejs 
  
RUN curl -sS https://get.symfony.com/cli/installer | bash 
  
RUN docker-php-ext-configure \
    intl 

RUN docker-php-ext-install \
    pdo pdo_mysql opcache intl zip calendar dom mbstring gd xsl 
  
RUN pecl install apcu && docker-php-ext-enable apcu

WORKDIR /var/www/
