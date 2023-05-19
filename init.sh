#!/bin/bash

echo "Run migrate rollback"
php artisan migrate:rollback

echo "Run migrate"
php artisan migrate

echo "Run UserSeeder"
php artisan db:seed --class=UserSeeder

echo "Run CompanySeeder"
php artisan db:seed --class=CompanySeeder

echo "Run JobSeeder"
php artisan db:seed --class=JobSeeder

echo "Run ProfileUserSeeder"
php artisan db:seed --class=ProfileUserSeeder