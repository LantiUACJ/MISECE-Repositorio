#!/bin/bash
sudo yum update -y > /dev/null 2> /dev/null < /dev/null &
cd /
cd var/www/html/MISECE-Repositorio
sudo rm .env
echo removed 
sudo aws s3 cp s3://s3intercambio2/Re/.env /var/www/html/MISECE-Repositorio/
sudo chown -R ec2-user ./composer.lock
echo composerpreview
sudo -u ec2-user composer update > s3://s3intercambio2/Re/logs/composer.txt  > /dev/null 2> /dev/null < /dev/null &
php artisan migrate --force > s3://s3intercambio2/Re/logs/migrate.txt > /dev/null 2> /dev/null < /dev/null &
aws s3 cp composer.txt s3://s3intercambio2/Re/logs/
aws s3 cp migrate.txt s3://s3intercambio2/Re/logs/
echo artisan
echo success!