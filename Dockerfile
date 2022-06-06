FROM php:7.4-apache

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
COPY start-apache /usr/local/bin
RUN a2enmod rewrite

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy application source
COPY . /var/www/
RUN chown -R www-data:www-data /var/www
RUN chmod -R 777 /var/www/assets/css/bootstrap.css
RUN chmod -R 777 /var/www/assets/vendors/bootstrap-icons/bootstrap-icons.css
RUN chmod -R 777 /var/www/assets/css/app.css
RUN chmod -R 777 /var/www/assets/css/pages/auth.css
RUN chmod -R 777 /var/www/assets/images/logo/logo.png

CMD ["start-apache"]
