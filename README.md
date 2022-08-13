POS System Using Laravel
The project was created while recording video "Create POS System Using Laravel"

Installation
Requirements
For system requirements you Check Laravel Requirement

Clone the repository from github.
git clone https://github.com/angkosal/laravel-pos.git [YourDirectoryName]
The command installs the project in a directory named YourDirectoryName. You can choose a different directory name if you want.

Install dependencies
Laravel utilizes Composer to manage its dependencies. So, before using Laravel, make sure you have Composer installed on your machine.

cd YourDirectoryName
composer install
Config file
Rename or copy .env.example file to .env 1.php artisan key:generate to generate app key.

Set your database credentials in your .env file
Set your APP_URL in your .env file.
Database
Migrate database table php artisan migrate
php artisan db:seed, this will initialize settings and create and admin user for you [email: admin@gmail.com - password: admin123]
Install Node Dependencies(optional)
npm install to install node dependencies
npm run dev to build our javascript
Create storage link
php artisan storage:link

Run Server
php artisan serve or Laravel Homestead
Visit localhost:8000 in your browser. Email: admin@gmail.com, Password: admin123.
Online demo: pos.minulhasan.com
