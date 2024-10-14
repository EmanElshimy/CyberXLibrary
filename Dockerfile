# Base image
FROM php:7.4-apache

# Enable mod_rewrite
RUN a2enmod rewrite

# Copy app files to the web root
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Give Apache the necessary permissions
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/ \
    && find /var/www/html/ -type d -exec chmod 755 {} \; \
    && find /var/www/html/ -type f -exec chmod 644 {} \;

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
