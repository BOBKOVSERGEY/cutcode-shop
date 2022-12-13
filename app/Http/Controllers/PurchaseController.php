<?php

namespace App\Http\Controllers;

use Domain\Order\Payment\PaymentData;
use Domain\Order\Payment\PaymentSystem;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class PurchaseController extends Controller
{
    public function index(): Redirector|Application|RedirectResponse
    {
        return redirect(
            PaymentSystem::create(new PaymentData())
                ->url()
        );
    }

    public function callback(): JsonResponse
    {
        return PaymentSystem::validate()
            ->response();
    }
}
