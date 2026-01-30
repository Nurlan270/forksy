FROM php:8.4-fpm

WORKDIR /var/www/web

RUN apt-get update \
    && apt-get install -y \
        git \
        curl \
        zip \
        unzip \
        libpq-dev \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
    && docker-php-ext-install \
        pdo \
        pdo_pgsql \
        bcmath \
        gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . /var/www/web

RUN chown -R www-data:www-data /var/www/web \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 9000

CMD ["php-fpm"]
