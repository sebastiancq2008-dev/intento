FROM php:8.2-apache

# Habilitar extensiones necesarias
RUN docker-php-ext-install sockets openssl

# Copiar todos los archivos al servidor
COPY . /var/www/html/

# Asignar permisos correctos
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Activar módulo de reescritura
RUN a2enmod rewrite
