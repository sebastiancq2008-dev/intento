FROM php:8.2-apache

# Habilita lo necesario para conexiones seguras
RUN docker-php-ext-install sockets openssl

# Copia todos los archivos al servidor
COPY . /var/www/html/

# Asigna permisos correctos
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html
RUN a2enmod rewrite
