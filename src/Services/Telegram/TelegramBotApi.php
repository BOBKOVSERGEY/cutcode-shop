<?php

namespace Services\Telegram;

use Illuminate\Support\Facades\Http;
use Services\Telegram\Exceptions\TelegramBotApiExeption;
use Throwable;

class TelegramBotApi
{
    public const HOST = 'https://api.telegram.org/bot';

    public static function fake(): TelegramBotApiFake
    {
        return app()->instance(
            TelegramBotApiContract::class,
            new TelegramBotApiFake()
        );
    }

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
