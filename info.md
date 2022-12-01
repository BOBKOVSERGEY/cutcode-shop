dd(
\App\Models\Product::query()
->select(['id', 'title', 'brand_id'])
->where('id', 1)
->toSql()
);

#create view component
php artisan make:component Forms/PrimaryButton --view

#tinker
php artisan tinker
User::create(['name'=>'Sergey', 'email'=> 'info@esdi.ru', 'password' => bcrypt('*******')])
dd(auth()->user());

# создание слушателя события

php artisan make:request SignUpFormRequest

# create notification

php artisan make:notification NewUserNotification

#isntall socialite
composer require laravel/socialite

#composer dump-autoload перегенираци файлов

# создание теста

php artisan make:test AuthControllerTest --unit

https://www.youtube.com/watch?v=3XzLjakADqA 19.24

// todo

1. сделали базовую вьюху
2. добавили роутинг ProductRegistrar
3. добавили контроллер ProductController
4. зарегистрировали в RouteServiceProvider ProductRegistrar::class

# Очереди

https://laravel.com/docs/9.x/queues#supervisor-configuration
запуск воркера php artisan queue:work

php artisan queue:table
php artisan make:job ProductJsonProperties

#Createn view model
php artisan make:view-model CatalogViewModel

php artisan make:event AfterSessionRegenerated


