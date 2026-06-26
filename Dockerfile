FROM php:8.2-apache

# Habilitar solo los módulos necesarios
RUN docker-php-ext-install sockets openssl

# Copiar todos los archivos
COPY . /var/www/html/

# Asignar permisos correctos
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Activar reescritura de URLs
RUN a2enmod rewrite
