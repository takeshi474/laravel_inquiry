FROM php:7.4-fpm

RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer
RUN apt-get update \
&& apt-get install -y libicu-dev \
git \
zip \
unzip \
vim \
libpq-dev \
zlib1g-dev \
&& docker-php-ext-install pdo_pgsql intl

WORKDIR /var/www/html
