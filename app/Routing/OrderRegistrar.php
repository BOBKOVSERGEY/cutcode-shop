<?php

declare(strict_types=1);

namespace App\Routing;

use App\Contracts\RouteRegistrar;
use App\Http\Controllers\OrderController;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\Route;

final class OrderRegistrar implements RouteRegistrar
{
    public function map(Registrar $registrar): void
    {
        Route::middleware('web')->group(function () {
            Route::get('/order', [OrderController::class, 'index'])->name('order');
            Route::post('/order', [OrderController::class, 'handle'])->name('order.handle');
        });
    }
}
