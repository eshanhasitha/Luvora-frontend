FROM php:8.4-apache

WORKDIR /var/www/html

RUN apt-get update \
    && apt-get install -y \
        git \
        unzip \
        curl \
        ca-certificates \
        libpq-dev \
        libzip-dev \
    && curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install \
        pdo \
        pdo_pgsql \
        zip \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader

RUN npm ci --no-audit --no-fund \
    --fetch-retries=5 \
    --fetch-retry-mintimeout=20000 \
    --fetch-retry-maxtimeout=120000

RUN npm run build

RUN mkdir -p database storage bootstrap/cache \
    && touch database/database.sqlite \
    && chown -R www-data:www-data \
        database \
        storage \
        bootstrap/cache \
    && chmod -R ug+rwX \
        database \
        storage \
        bootstrap/cache

RUN sed -i \
    's!/var/www/html!/var/www/html/public!g' \
    /etc/apache2/sites-available/000-default.conf

EXPOSE 80

CMD ["apache2-foreground"]