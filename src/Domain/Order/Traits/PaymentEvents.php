<?php

namespace Domain\Order\Traits;

use Closure;

trait PaymentEvents
{
    protected static Closure $onCreating;

    protected static Closure $onSuccess;

    protected static Closure $onValidating;

    protected static Closure $onError;

    public static function onCreating(Closure $event): void
    {
        self::$onCreating = $event;
    }

    public static function onSuccess(Closure $event): void
    {
        self::$onSuccess = $event;
    }

    public static function onValidating(Closure $event): void
    {
        self::$onValidating = $event;
    }

    public static function onError(Closure $event): void
    {
        self::$onError = $event;
    }
}
