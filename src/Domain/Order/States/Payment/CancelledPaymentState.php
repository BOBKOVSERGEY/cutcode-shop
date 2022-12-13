<?php

namespace Domain\Order\States\Payment;

final class CancelledPaymentState extends PaymentState
{
    public static string $name = 'failed';
}
