# syntax=docker/dockerfile:1.6
FROM php:8.3-cli

# Dependências do PHP e pdo_pgsql
RUN apt-get update && apt-get install -y git unzip libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

RUN apt-get install npm -y

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# 1) Copia só os manifests primeiro (melhor cache)
COPY composer.json composer.lock* ./

# 2) Instala as deps (usa cache do build)
RUN --mount=type=cache,target=/root/.composer \
    composer install --no-interaction --prefer-dist --no-scripts

# 3) Copia o restante do código
COPY . .

# 4) Scripts do Laravel (ignora se não existirem)
RUN composer run-script post-root-package-install --no-interaction || true \
 && composer run-script post-create-project-cmd --no-interaction || true \
 && chmod -R 777 storage bootstrap/cache
