FROM php:8.2-apache

# Instalar servicio de envío de correos
RUN apt-get update && apt-get install -y --no-install-recommends \
    sendmail \
    && rm -rf /var/lib/apt/lists/*

# Habilitar extensiones necesarias
RUN docker-php-ext-install sockets

# Copiar todos los archivos del proyecto
COPY . /var/www/html/

# Asignar permisos correctos
RUN chown -R www-data:www-data /var/www/html
RUN a2enmod rewrite
