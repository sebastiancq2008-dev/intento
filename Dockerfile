FROM php:8.2-apache

# Habilitar solo lo necesario
RUN docker-php-ext-install sockets openssl

# Copiar archivos
COPY . /var/www/html/

# Permisos correctos
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Activar reescritura
RUN a2enmod rewrite
