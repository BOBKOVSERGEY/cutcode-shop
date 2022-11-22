<?php


namespace App\Routing;


use App\Contracts\RouteRegistrars;
use App\Http\Controllers\ProductController;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\Route;

class ProductRegistrar implements RouteRegistrars
{

    public function map(Registrar $registrar): void
    {
        Route::middleware('web')->group(function () {
            Route::get('/product/{product:slug}', ProductController::class)
                ->name('product');
        });
    }
}
