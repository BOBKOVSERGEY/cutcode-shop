<?php

namespace Domain\Order\Event;

use Domain\Order\Models\Order;
use Domain\Order\States\OrderState;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderStatusChanged
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public Order $order,
        public OrderState $old,
        public OrderState $current
    ) {
    }

}
