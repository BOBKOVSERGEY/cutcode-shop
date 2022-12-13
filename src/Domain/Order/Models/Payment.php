<?php

namespace Domain\Order\Models;

use Domain\Order\States\Payment\PaymentState;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStates\HasStates;

class Payment extends Model
{
    use HasFactory;
    use HasStates;
    use HasUuids;

    protected $fillable = [
        'payment_gateway',
        'payment_id',
        'meta'
    ];

    protected $casts = [
        'meta' => 'collection',
        'state' => PaymentState::class,
    ];

    public function uniqueIds(): array
    {
        return ['payment_id'];
    }
}
