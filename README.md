# easyride-rental
A web-based app that offers hassle-free, affordable car rentals with a diverse fleet, flexible options, and 24/7 customer support, ensuring your journey is smooth and stress-free.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

## Clone

* In your terminal, type in ```cd /your/desired/path``` to enter the directory you would like to clone the repository
* Then run ```git clone https://github.com/stephenalonzo/easyride-rental.git```

Voila! You have successfully cloned this project.

### Prerequisites

The things you need before installing the software.

* Composer
* Node.js (npm) version: 20.x
* PHP version: 8.x
* Laravel version: 10.x
* MySQL version：8.0.x / MariaDB version：10.3.x

### Installation

A step by step guide that will tell you how to get the development environment up and running.

```
copy .env.example .env
composer install
php artisan key:generate
php artisan migrate:fresh –seed
npm install
npm run build
```

## Usage

Development

```
php artisan serve
npm run dev
```

Clear & Cache

```optimize``` will cache & clear config and route files

```
php artisan optimize:clear
```

MySQL env variables
```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=easyride
DB_USERNAME=root
DB_PASSWORD=
```

Set env variables for SMTP mail sending with Mailtrap, or other mailing services

```
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=**************
MAIL_PASSWORD=********
```
