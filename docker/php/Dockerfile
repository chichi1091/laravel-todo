FROM php:8.0-fpm
COPY php.ini /usr/local/etc/php/

RUN apt-get update \
  && apt-get upgrade -y \
  && apt-get install -y libicu-dev libzip-dev libonig-dev libssl-dev zip unzip \
  && docker-php-ext-install zip pdo_mysql \
  && pecl install xdebug \
  && docker-php-ext-enable xdebug

COPY --from=composer /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

WORKDIR /var/www

RUN composer global require "laravel/installer"
