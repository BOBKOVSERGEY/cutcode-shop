<?php


namespace Domain\Catalog\Providers;


use Illuminate\Support\ServiceProvider;

class CatalogServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
    }

    public function register()
    {
        $this->app->register(
            ActionsServiceProvider::class
        );
    }
}
