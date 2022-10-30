<?php

namespace App\Providers;

use App\Support\Testing\FakerImageProvider;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\ServiceProvider;

class TestingServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create();
            $faker->addProvider(new FakerImageProvider($faker));

            return $faker;
        });
    }

    public function boot()
    {
        //
    }
}
