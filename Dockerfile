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
    php83-openssl \
    nginx \
    git \
    curl

# Copy package.json and package-lock.json first for better caching
COPY package.json package-lock.json ./

# Install Node.js dependencies
RUN npm install --production

# Copy the rest of the application (including vendor/ folder)
COPY --chown=node:node . .

# Ensure Laravel is in PATH
ENV PATH="/app/vendor/bin:$PATH"

# Set correct permissions for the storage folder
RUN chmod -R 777 storage bootstrap/cache

# Copy Nginx configuration
COPY nginx.conf /etc/nginx/nginx.conf

# Expose necessary ports
EXPOSE 8000 5173 80

# Switch to a non-root user for better security
USER node

# Run Laravel-specific commands during container startup
CMD ["/bin/sh", "/app/docker-entrypoint.sh"]
