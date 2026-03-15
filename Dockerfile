FROM php:8.4.19-apache

# install composer
RUN apt-get update && apt-get install -y \
    default-mysql-client \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql zip bcmath gd

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === 'c8b085408188070d5f52bcfe4ecfbee5f727afa458b2573b8eaaf77b3419b0bf2768dc67c86944da1544f06fa544fd47') { echo 'Installer verified'.PHP_EOL; } else { echo 'Installer corrupt'.PHP_EOL; unlink('composer-setup.php'); exit(1); }" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

# install laravel
RUN composer global require laravel/installer

WORKDIR /app

# Rarely changing files
COPY . .

# Dependencies
RUN --mount=type=bind,source=composer.lock,target=composer.lock \
    --mount=type=bind,source=composer.json,target=composer.json \
    composer install

# Place executables in the environment using $PATH
ENV PATH="/app/vendor/bin:$PATH"

# Run migrations and start app
CMD php artisan migrate \
    && php artisan config:clear \
    && php artisan cache:clear \
    && php artisan config:cache \
    && php artisan serve --host=0.0.0.0 --port=8000