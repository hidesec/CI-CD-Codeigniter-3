FROM php:7.4-apache

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
COPY start-apache /usr/local/bin
RUN a2enmod rewrite

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

#install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN php -r "unlink('composer-setup.php');"

# Copy application source
COPY . /var/www/
RUN chown -R www-data:www-data /var/www
ENV APP_ENV "$APP_ENV"
ENV DB_HOSTNAME "$DB_HOSTNAME"
ENV DB_USERNAME "$DB_USERNAME"
ENV DB_PASSWORD "$DB_PASSWORD"
ENV DB_DATABASE "$DB_DATABASE"
ENV DB_DRIVER "$DB_DRIVER"
RUN rm -rf /var/www/.env
RUN set | grep APP_ENV > /var/www/.env
RUN set | grep DB_HOSTNAME >> /var/www/.env
RUN set | grep DB_USERNAME >> /var/www/.env
RUN set | grep DB_PASSWORD >> /var/www/.env
RUN set | grep DB_DATABASE >> /var/www/.env
RUN set | grep DB_DRIVER >> /var/www/.env
RUN chmod -R 755 /var/www/assets


CMD ["start-apache"]
