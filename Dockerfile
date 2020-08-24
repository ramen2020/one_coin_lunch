FROM php:7.3-fpm-alpine

COPY ./app /var/www/html
COPY ./docker/php/php.ini /usr/local/etc/php/php.ini

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer

RUN set -x && \
    apk update && \
    apk add --no-cache libxml2 libxml2-dev curl curl-dev autoconf $PHPIZE_DEPS && \
    docker-php-ext-install opcache mysqli pdo pdo_mysql xml mbstring curl session tokenizer json && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer && \
    composer install && \
    chmod -R a+w storage/ bootstrap/cache

RUN apk add --update nodejs nodejs-npm

WORKDIR /var/www/html

RUN npm install
