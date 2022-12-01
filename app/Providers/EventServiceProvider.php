<?php

namespace App\Providers;

use App\Events\AfterSessionRegenerated;
use App\Listeners\SendEmailNewUserListener;
use Domain\Cart\CartManager;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            //SendEmailVerificationNotification::class,
            SendEmailNewUserListener::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(AfterSessionRegenerated::class, function (AfterSessionRegenerated $event) {
            app(CartManager::class)->updateStorageId(
                $event->old,
                $event->current
            );
        });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
