FROM php:8.2-apache

# Instalar extensión de PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copiar archivos del proyecto
COPY . /var/www/html/

# Dar permisos
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80