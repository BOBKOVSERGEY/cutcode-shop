<?php

namespace Domain\Cart\Contracts;

interface CartIdentityStorageContract
{
    public function get(): string;
}
