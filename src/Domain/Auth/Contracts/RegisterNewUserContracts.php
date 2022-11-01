<?php

namespace Domain\Auth\Contracts;

interface RegisterNewUserContracts
{
    public function __invoke(string $name, string $email, string $password);
}
