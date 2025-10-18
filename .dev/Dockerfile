FROM php:8.3-cli

# Instala dependências e extensões PHP
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Instala o Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Define o diretório de trabalho
WORKDIR /var/www/html

# Copia o projeto
COPY . .

# Instala dependências do Laravel
RUN composer install

# Dá permissão para storage e bootstrap
RUN chmod -R 777 storage bootstrap/cache
