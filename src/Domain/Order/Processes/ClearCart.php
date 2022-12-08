<?php


namespace Domain\Order\Processes;


use Domain\Order\Contracts\OrderProcessContract;
use Domain\Order\Models\Order;

class ClearCart implements OrderProcessContract
{

    public function handle(Order $order, $next)
    {
        cart()->truncate();
        return $next($order);
    }
}
