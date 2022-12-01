<?php


namespace Domain\Cart\StorageIdentities;


use Domain\Cart\Contracts\CartIdentityStorageContract;

class FakeIdentityStorage implements CartIdentityStorageContract
{

    public function get(): string
    {
        return 'tests';
    }
}
