#!/bin/sh

# Start PHP-FPM
php-fpm83 -D

# Start Nginx
nginx -g "daemon off;"

# Start Vite dev server
npm run dev
