<?php

namespace Domain\Auth\Contracts;

use Domain\Auth\DTOs\NewUserDTO;

interface RegisterNewUserContracts
{
    public function __invoke(NewUserDTO $data);
}
