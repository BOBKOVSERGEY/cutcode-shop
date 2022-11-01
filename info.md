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

