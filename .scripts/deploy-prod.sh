#!/bin/bash
set -e

echo "Deployment started ..."

# Pull the latest version of the app
git pull origin master

# Install composer dependencies
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

php artisan cache:clear

echo "Deployment finished!"
