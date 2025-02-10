#!/bin/sh

# Start Nginx
nginx -g "daemon off;" &

# Start Vite dev server
npm install
npm run dev &

# Start laravel
php artisan key:generate
php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve
