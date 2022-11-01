<?php

namespace Domain\Auth\Actions;

use Domain\Auth\Contracts\RegisterNewUserContracts;
use Domain\Auth\Models\User;
use Illuminate\Auth\Events\Registered;

class RegisterNewUserAction implements RegisterNewUserContracts
{
    public function __invoke(string $name, string $email, string $password)
    {
        // create user
        $user = User::query()->create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        event(new Registered($user));
        // logIn
        auth()->login($user);
    }
}
