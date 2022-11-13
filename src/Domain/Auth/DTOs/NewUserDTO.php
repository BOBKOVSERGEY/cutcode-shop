<?php


namespace Domain\Auth\DTOs;


use Illuminate\Http\Request;
use Support\Traits\Makeable;

class NewUserDTO
{
    use Makeable;

    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
    ) {
    }

    public static function fromRequest(Request $request): NewUserDTO
    {
        return self::make(
            ...$request->only([
            'name',
            'email',
            'password',
        ])
        );
    }
}
