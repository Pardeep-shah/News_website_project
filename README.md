=> composer create-project laravel/laravel:^11.0 News_website
cd News_website

create database in pgadmin

=> change this in .env file
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=news_website
DB_USERNAME=postgres
DB_PASSWORD=root

php artisan migrate

php artisan serve

php artisan make:model Country -m

=> i have created a country seeder class
php artisan db:seed --class=CountriesTableSeeder

create register functionlity
(first_name,last_name,email,country,password,confirm_password)

no need to add confirm password in user model, it's just for validation
confirm_password (or in Laravel, password_confirmation) is not a database field.

It’s only used at the validation step ('password' => 'confirmed') to check that the user typed the same password twice.

## Implement 2FA functionality for this i have to add 'twofa_secret',and 'twofa_enabled' colm in Users table

=> 'twofa_secret',
'twofa_enabled'

composer require pragmarx/google2fa
composer require simplesoftwareio/simple-qrcode

## improve register form

1. only strong password acceptable
2. unique email
3. after register successful send welcome message on email

step1

=> in .env file apply credential
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=pardeep88514@gmail.com
MAIL_PASSWORD=xfnpwcpnrypjbbga
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=pardeep88514@gmail.com
MAIL_FROM_NAME="My Laravel App"

step2
create html file for login view for email
create mail file WelcomeMail
update the register method

##

1. create a model named News.php
   'user_id',
   'news_heading',
   'news_header_image',
   'short_description',
   'news_large_description',
   'images', // multiple images (JSON or comma separated)
   'news_link', // external/internal link
   'published_by', // name of publisher
   'content',
   'category', // e.g. politics, sports, tech
   'tags', // comma separated tags
   'status', // draft / published
   'published_at', // when news goes live
   'views_count',
2. then create migration =>C:\xampp\htdocs\News_website\database\migrations\2025_09_05_124604_create_news_table.php

3. now make seeder file named => NewsSeeder.php
=>  to run seeder use command => php artisan db:seed --class=NewsSeeder
