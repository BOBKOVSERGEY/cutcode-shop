<?php

namespace App\Services\Telegram;

use App\Services\Telegram\Exceptions\TelegramBotApiExeption;
use Illuminate\Support\Facades\Http;

class TelegramBotApi
{
    public const HOST = 'https://api.telegram.org/bot';

    public static function sendMessage(string $token, int $chatId, string $text): void
    {
        try {
            Http::withOptions(['verify' => false])
                ->get(self::HOST . $token . '/sendMessage', [
                    'chat_id' => $chatId,
                    'text' => $text
                ]);
        } catch (\Throwable $e) {
            throw new TelegramBotApiExeption('123');
        }
    }
}
