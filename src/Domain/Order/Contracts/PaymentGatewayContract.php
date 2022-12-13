<?php


namespace Domain\Order\Contracts;


use Domain\Order\Payment\PaymentData;
use Illuminate\Http\JsonResponse;

interface PaymentGatewayContract
{
    public function paymentId(): string;

    public function confiqure(array $config): void;

    public function data(PaymentData $data): self;

    public function request(): mixed;

    public function response(): JsonResponse;

    public function url(): string;

    public function validate(): bool;

    public function paid(): bool;

    public function errorMessage(): string;
}
