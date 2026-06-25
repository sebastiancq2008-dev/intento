FROM php:8.2-apache

# Habilitar lo necesario para conexiones seguras
RUN docker-php-ext-install sockets openssl

# Copiar todos los archivos
COPY . /var/www/html/

# Permisos correctos
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html
RUN a2enmod rewrite
