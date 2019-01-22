FROM php:5.6-apache



RUN set -ex \
    && apt-get update \
    && apt-get install -y --no-install-recommends unzip libpng-dev vim \
    && docker-php-ext-install iconv mbstring mysqli mysql gd


RUN chown -R www-data:www-data /var/www/html/