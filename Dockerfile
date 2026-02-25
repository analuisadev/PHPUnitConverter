# Estágio 1: Composer (Igual ao anterior)
FROM composer:2 AS composer_install_stage
WORKDIR /app
COPY composer.json ./
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Estágio 2: Apache + PHP
FROM php:8.3-apache

# 1. Ativar o mod_rewrite do Apache (essencial para rotas de frameworks como Laravel/Symfony)
RUN a2enmod rewrite

# 2. Instalar extensões básicas do PHP (ex: PDO MySQL)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo_mysql gd zip

# 3. Configurar o DocumentRoot do Apache para apontar para a pasta correta
# Por padrão é /var/www/html, mas se for Laravel, mude para /var/www/html/public
ENV APACHE_DOCUMENT_ROOT /var/www/html
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

WORKDIR /var/www/html

# 4. Copiar arquivos e ajustar permissões
# No Apache (Debian), o usuário padrão é www-data
COPY --chown=www-data:www-data . /var/www/html
COPY --from=composer_install_stage --chown=www-data:www-data /app/vendor /var/www/html/vendor

EXPOSE 80

# O Apache já inicia automaticamente nesta imagem, não precisa de CMD específico