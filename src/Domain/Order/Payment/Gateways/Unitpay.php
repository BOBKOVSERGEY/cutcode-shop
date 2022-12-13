<?php


namespace Domain\Order\Payment\Gateways;


use Domain\Order\Contracts\PaymentGatewayContract;
use Domain\Order\Payment\PaymentData;
use Illuminate\Http\JsonResponse;

class Unitpay implements PaymentGatewayContract
{

    public function paymentId(): string
    {
        // TODO: Implement paymentId() method.
    }

    public function confiqure(array $config): void
    {
        // TODO: Implement confiqure() method.
    }

    public function data(PaymentData $data): PaymentGatewayContract
    {
        // TODO: Implement data() method.
    }

    public function request(): mixed
    {
        // TODO: Implement request() method.
    }

    public function response(): JsonResponse
    {
        // TODO: Implement response() method.
    }

    public function url(): string
    {
        // TODO: Implement url() method.
    }

    public function validate(): bool
    {
        // TODO: Implement validate() method.
    }

    public function paid(): bool
    {
        // TODO: Implement paid() method.
    }

    public function errorMessage(): string
    {
        // TODO: Implement errorMessage() method.
    }
}
