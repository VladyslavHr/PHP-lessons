composer create-project laravel/laravel example-app // создание ларавель проекта

php artisan db:seed // запускает сиды;

php artisan migrate:fresh --seed .. обновляет базу данных и создает новые сиды;

php artisan migrate --seed .. запуск миграции , создание таблиц базы данных;

$ composer require laravel/ui // авторизация ларавел;

$ php artisan ui bootstrap --auth .. механизм авторизации;

$ npm install .. установка пакета фронт енд;

$ npm run dev // собирает стили и скрипты, создает файлы public/css/app.css 
    publick/js/ app.js исходные файлы в папке resources;

php artisan make:migration ;

php artisan make:model Product -mcrf ;

php artisan rout:list ;

php artisan migrate:rollback // откатить миграцию



//// Создание сущность(контроллер модель....)

php artisan make:model Product -mcrf ; (m(миграция)c(контроллер)r(ресурс)f(фактори))

php artisan migrate

php artisan db:seed




//
установка пректа

1. git clone
2. composer install 
3. create env file
4. npm install
5. npm run dev 
6. migrate
  
//
