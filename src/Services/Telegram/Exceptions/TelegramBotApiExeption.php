<?php

namespace Services\Telegram\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TelegramBotApiExeption extends Exception
{
    public function report()
    {
    }

    public function render(Request $request): JsonResponse
    {
        return response()->json([]);
    }
}
