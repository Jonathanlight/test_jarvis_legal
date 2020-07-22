#!/bin/bash

# install bundles
composer install

# load fixtures
php bin/console doctrine:database:drop --force
php bin/console doctrine:database:create
php bin/console d:s:u -f
php bin/console hautelook:fixtures:load