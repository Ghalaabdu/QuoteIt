FROM richarvey/nginx-php-fpm:latest

# Copy application code
COPY . /var/www/html

# Image Config
ENV FRAMEWORK=laravel
ENV WEBROOT=/var/www/html/public
ENV PHP_ERRORS_STDERR=1
ENV RUN_SCRIPTS=1
ENV REAL_IP_HEADER=1

# Run Laravel artisan commands during startup/build and fix permissions
RUN mkdir -p /var/www/html/database && \
    touch /var/www/html/database/database.sqlite && \
    chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

EXPOSE 80