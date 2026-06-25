FROM php:8.2-apache

# Instalamos lo necesario para el envío de correos
RUN apt-get update && apt-get install -y --no-install-recommends \
    sendmail \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install sockets

# Copiamos todos los archivos al servidor
COPY . /var/www/html/

# Permisos correctos
RUN chown -R www-data:www-data /var/www/html
RUN a2enmod rewrite
