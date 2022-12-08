<?php

namespace Domain\Order\Contracts;

use Domain\Order\Models\Order;

interface OrderProcessContract
{
    public function handle(Order $order, $next);
}
