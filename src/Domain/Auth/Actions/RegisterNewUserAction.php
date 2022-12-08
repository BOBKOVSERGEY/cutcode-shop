<?php

namespace Domain\Auth\Actions;

use Domain\Auth\Contracts\RegisterNewUserContracts;
use Domain\Auth\DTOs\NewUserDTO;
use Domain\Auth\Models\User;
use Illuminate\Auth\Events\Registered;
use Support\SessionRegenerator;

class RegisterNewUserAction implements RegisterNewUserContracts
{
    public function __invoke(NewUserDTO $data)
    {
        // create user
        $user = User::query()->create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => bcrypt($data->password),
        ]);

        event(new Registered($user));
        // logIn
        //auth()->login($user);
        SessionRegenerator::run(fn() => auth()->login($user));
    }
}
