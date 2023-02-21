# myblog-Laravel - beta

## Installation

* Composer Install
* npm Install
* Please run the below command to generate the new key.
php artisan key:generate
* Please fill your DB credentials in the .env file.
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mylaracool
DB_USERNAME=root
DB_PASSWORD=

npm run production

Please run the following commands to clear all cache from the project.
php artisan optimize
php artisan migrate  This will migrate the database tables. For more details visit <https://laravel.com/docs/8.x/migrations>
php artisan serve
php artisan serve --host 0.0.0.0

## Feature

* AUTH USER
* USER ROLE
* USER PERMISSIONS
* MINIBLE TEMPLATES

## Branch

* Main -> prject gabungan (yoggi(UI), suryo, sigit)
* project/ui -> branch pak yoggi

* project/suryo -> branch pak suryo (berhenti pada fungsi add to cart langsung dari halaman product)
* project/suryo2 -> branch pak suryo (pengembangan fungsi add to cart muncul modal terlebih dahulu)

* project/sigit -> branch pak sigit

## link

* login : <http://127.0.0.1:8000/login>
username : admin@gmail.com / 123456
username : as.sgiworld@gmail.com / 123456
