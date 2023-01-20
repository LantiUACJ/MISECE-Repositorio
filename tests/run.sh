#!/bin/bash
sudo yum update -y > /dev/null 2> /dev/null < /dev/null &
cd /
cd var/www/html/MISECE-Repositorio
sudo rm .env
echo removed 
sudo aws s3 cp s3://s3intercambio2/Re/.env /var/www/html/MISECE-Repositorio/ > /dev/null 2> /dev/null < /dev/null &
sudo chown -R ec2-user ./composer.lock
echo composerpreview
sudo -u ec2-user composer update > s3://s3intercambio2/Re/logs/composer.txt
php artisan migrate --force > s3://s3intercambio2/Re/logs/migrate.txt
echo artisan
echo success!