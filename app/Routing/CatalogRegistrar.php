<?php

namespace App\Routing;

use App\Contracts\RouteRegistrars;
use App\Http\Controllers\CatalogController;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\Route;

class CatalogRegistrar implements RouteRegistrars
{

    public function map(Registrar $registrar): void
    {
        Route::middleware('web')->group(function () {
            Route::get('/catalog/{category:slug?}', CatalogController::class)
                ->name('catalog');
        });
    }
}