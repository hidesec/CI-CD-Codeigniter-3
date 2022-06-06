FROM php:7.4-apache

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
COPY start-apache /usr/local/bin
RUN a2enmod rewrite

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy application source
COPY . /var/www/
RUN chown -R www-data:www-data /var/www
RUN CHMOD 755 /var/www/assets
RUN CHMOD 755 /var/www/assets/*

CMD ["start-apache"]
