# The Wedding Invitation

## Local Installation

### Setup this repository first

```bash
git clone https://github.com/alif-arrizqy/the-wedding-invitation.git
cd the-wedding-invitation
```

### Prerequisites

- PHP version 8 or higher
- Composer installed
- Node.js and npm installed
- MySQL or MariaDB

### Setup Laravel Packages and Migrations

```bash
composer install
cp .env.example .env
php artisan key:generate
npm install && npm run dev
```

Update the `.env` file with your database configuration:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wedding_invitation
DB_USERNAME=yourusername
DB_PASSWORD=yourpassword
```

Then continue with:
```bash
php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve
```

### Usage

- Landing page with guest name: http://127.0.0.1:8000/?to=deankt
- Admin login: http://127.0.0.1:8000/admin

## Deployment on Server

### 1. Install Required Software

```bash
# Update package lists
sudo apt update

# Install PHP 8.3 and required extensions
sudo apt install -y lsb-release ca-certificates apt-transport-https software-properties-common gnupg2
echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/sury-php.list
wget -qO - https://packages.sury.org/php/apt.gpg | sudo apt-key add -
sudo apt update
sudo apt install -y php8.3 php8.3-cli php8.3-common php8.3-curl php8.3-mbstring php8.3-xml php8.3-zip php8.3-mysql php8.3-gd php8.3-bcmath php8.3-fpm php8.3-tokenizer php8.3-fileinfo

# Install Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer

# Install MySQL/MariaDB
sudo apt install -y mariadb-server
sudo mysql_secure_installation

# Install Node.js and npm
You can visit https://nodejs.org/en/download
and install node for Linux and using nvm

# Install Nginx
sudo apt install -y nginx
```

### 2. Set up MySQL Database

```bash
sudo mysql -u root -p
```

In MySQL console:
```sql
CREATE DATABASE wedding_invitation;
CREATE USER 'wedding_user'@'localhost' IDENTIFIED BY 'your_secure_password';
GRANT ALL PRIVILEGES ON wedding_invitation.* TO 'wedding_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### 3. Clone and Setup Project

```bash
# Clone the repository
cd /home/pi
git clone https://github.com/alif-arrizqy/the-wedding-invitation.git
cd the-wedding-invitation

# Install dependencies
composer install
cp .env.example .env
```

Edit the `.env` file with your database settings:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wedding_invitation
DB_USERNAME=wedding_user
DB_PASSWORD=your_secure_password
```

Continue setup:
```bash
php artisan key:generate
npm install
npm run build
php artisan migrate:fresh --seed
php artisan storage:link
```

### 4. Set Proper Permissions

```bash
# Set ownership
sudo chown -R pi:www-data /home/pi/the-wedding-invitation
sudo chown -R www-data:www-data /home/pi/the-wedding-invitation/storage
sudo chown -R www-data:www-data /home/pi/the-wedding-invitation/bootstrap/cache

# Set permissions
sudo chmod -R 775 /home/pi/the-wedding-invitation/storage
sudo chmod -R 775 /home/pi/the-wedding-invitation/bootstrap/cache
```

### 5. Configure Nginx

Create a new Nginx server block configuration:
```bash
sudo nano /etc/nginx/sites-available/wedding-invitation
```

Add the following configuration:
```
server {
    listen 80;
    server_name SERVER-IP;
    root /home/pi/the-wedding-invitation/public;

    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

Replace `SERVER-IP` with your Server IP address.

Enable the site and restart Nginx:
```bash
sudo ln -s /etc/nginx/sites-available/wedding-invitation /etc/nginx/sites-enabled/
sudo systemctl restart nginx
sudo systemctl restart php8.3-fpm
```

### 6. Access Your Wedding Invitation

- Main page: http://SERVER-IP
- With guest name: http://SERVER-IP/?to=deankt
- Admin login: http://SERVER-IP/admin

## Troubleshooting

If you encounter issues with file permissions or logs:

```bash
# Fix storage permissions
sudo chmod -R 777 /home/pi/the-wedding-invitation/storage/logs
sudo touch /home/pi/the-wedding-invitation/storage/logs/laravel.log
sudo chmod 666 /home/pi/the-wedding-invitation/storage/logs/laravel.log

# Clear Laravel caches
php artisan config:clear
php artisan cache:clear

# After clearance laravel caches, restart nginx service
sudo systemctl restart nginx
```
