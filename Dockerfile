FROM php:8.2-apache

# Habilitar extensiones necesarias para SMTP
RUN docker-php-ext-install sockets openssl

# Copiar archivos
COPY . /var/www/html/

# Permisos
RUN chown -R www-data:www-data /var/www/html
RUN a2enmod rewrite
