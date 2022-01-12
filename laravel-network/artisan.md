composer create-project laravel/laravel example-app// создание ларавель проекта

php artisan db:seed // запускает сиды;

php artisan migrate:fresh --seed .. обновляет базу данных и создает новые сиды;

php artisan migrate --seed .. запуск миграции , создание таблиц базы данных;

$ composer require laravel/ui // авторизация ларавел;

$ php artisan ui bootstrap --auth .. мехфнизм авторизации;

$ npm install .. установка пакета фронт енд;

$ npm run dev // собирает стили и скрипты, создает файлы public/css/app.css 
    publick/js/ app.js исходные файлы в папке resources;

php artisan make:migration ;

php artisan make:model Product -mcrf ;

php artisan rout:list ;

php artisan make:model Product -mcrf ;

php artisan migrate:rollback // откатить миграцию

php artisan db:seed 
