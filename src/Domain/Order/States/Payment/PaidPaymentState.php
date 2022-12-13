<?php

namespace Domain\Order\States\Payment;

final class PaidPaymentState extends PaymentState
{
    public static string $name = 'paid';
}
