FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    unzip \
    git \
    curl \
    && docker-php-ext-install \
    mysqli \
    pdo \
    pdo_mysql \
    pgsql \
    pdo_pgsql \
    zip
