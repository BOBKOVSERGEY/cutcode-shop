<?php

namespace App\Services\Telegram;

use App\Services\Telegram\Exceptions\TelegramBotApiExeption;
use Illuminate\Support\Facades\Http;
use Throwable;

class TelegramBotApi
{
    public const HOST = 'https://api.telegram.org/bot';

    public static function sendMessage(string $token, int $chatId, string $text): bool
    {
        try {
            $response = Http::withOptions(['verify' => false])
                ->get(self::HOST . $token . '/sendMessage', [
                    'chat_id' => $chatId,
                    'text' => $text
                ])
                ->throw()
                ->json();

            return $response['ok'] ?? false;
        } catch (Throwable $e) {
            report(new TelegramBotApiExeption($e->getMessage()));
            
            return false;
        }
    }
}
