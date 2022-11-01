<?php

namespace App\Contracts;

use Illuminate\Contracts\Routing\Registrar;

interface RouteRegistrars
{
    public function map(Registrar $registrar): void;
}
