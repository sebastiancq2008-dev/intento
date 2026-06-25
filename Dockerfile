FROM php:8.2-apache

# Instalar herramienta de envío de correos
RUN apt-get update && apt-get install -y --no-install-recommends \
    sendmail \
    && rm -rf /var/lib/apt/lists/*

# Habilitar módulos necesarios
RUN docker-php-ext-install sockets

# Copiar tus archivos
COPY . /var/www/html/

# Permisos correctos
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html
RUN a2enmod rewrite
