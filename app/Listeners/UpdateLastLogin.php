<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Events\Dispatcher;

class UpdateLastLogin
{
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(
            Login::class,
            [self::class, 'handle']
        );
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $user = $event->user;
        $user->last_login = now();
        $user->save();
    }
}
