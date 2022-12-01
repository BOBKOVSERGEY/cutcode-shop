<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AfterSessionRegenerated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public function __construct(
        public string $old,
        public string $current
    ) {
        //
    }

}
