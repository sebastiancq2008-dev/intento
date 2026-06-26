FROM php:8.2-apache

# 1. Actualizar repositorios e instalar librerías necesarias del sistema
RUN apt-get update && apt-get install -y \
    libssl-dev \
    && rm -rf /var/lib/apt/lists/*

# 2. Instalar solo las extensiones de PHP que sí requieren este comando
# (Nota: 'openssl' no es una extensión que se instale así, 
# se compila con el núcleo de PHP automáticamente si las librerías están presentes)
RUN docker-php-ext-install sockets

# Copiar todos los archivos al servidor
COPY . /var/www/html/

# Asignar permisos correctos
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Activar módulo de reescritura
RUN a2enmod rewrite
