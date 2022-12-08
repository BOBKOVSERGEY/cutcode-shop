<?php

namespace Domain\Order\Enums;

use Domain\Order\Models\Order;
use Domain\Order\States\CancelledOrderState;
use Domain\Order\States\NewOrderState;
use Domain\Order\States\OrderState;
use Domain\Order\States\PaidOrderState;
use Domain\Order\States\PendingOrderState;

enum OrderStatuses: string
{
    case New = 'new'; // новый
    case Pending = 'pending'; // в ожидании
    case Paid = 'paid'; // оплачен
    case Cancelled = 'cancelled'; // отменен

    public function createState(Order $order): OrderState
    {
        return match ($this) {
            OrderStatuses::New => new NewOrderState($order),
            OrderStatuses::Pending => new PendingOrderState($order),
            OrderStatuses::Paid => new PaidOrderState($order),
            OrderStatuses::Cancelled => new CancelledOrderState($order)
        };
    }
}
