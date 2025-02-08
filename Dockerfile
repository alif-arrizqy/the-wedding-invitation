# Use Node.js 22 Alpine as the base image
FROM node:22-alpine

# Set the working directory
WORKDIR /app

# Install necessary dependencies
RUN apk update && apk add --no-cache \
    php83 \
    php83-cli \
    php83-phar \
    php83-mbstring \
    php83-curl \
    php83-xml \
    php83-zip \
    nginx \
    git \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy package.json and package-lock.json
COPY package.json package-lock.json ./

# Install Node.js dependencies
RUN npm install --production

# Install Laravel using Composer
RUN composer create-project --prefer-dist laravel/laravel .

# Ensure Laravel is in PATH
ENV PATH="/app/vendor/bin:$PATH"

# Copy the rest of the application
COPY . .

# Expose necessary ports
EXPOSE 8000 5173 80

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Set correct permissions for the storage folder
RUN chmod -R 777 storage bootstrap/cache

# Copy Nginx configuration
COPY nginx.conf /etc/nginx/nginx.conf

# Run Laravel-specific commands during container startup
CMD ["/bin/sh", "/app/docker-entrypoint.sh"]
