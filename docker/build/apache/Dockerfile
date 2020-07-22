FROM php:7.4-apache
MAINTAINER jonathankablan <jonathan.kablan@gmail.com>

ENV COMPOSER_ALLOW_SUPERUSER=1

EXPOSE 80

# Install system dependencies
RUN apt-get update -qq && \
    apt-get install -qy \
    git \
    vim \
    gnupg \
    libicu-dev \
    libzip-dev \
    unzip \
    zip \
    zlib1g-dev

# PHP Extensions
RUN docker-php-ext-configure zip && \
    docker-php-ext-install -j$(nproc) intl opcache pdo pdo_mysql zip

## Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Apache
RUN a2enmod rewrite remoteip

RUN groupadd dev -g 999
RUN useradd dev -g dev -d /var/www/symfony -m
RUN chown -R dev:dev /var/www/symfony

WORKDIR /var/www/symfony
