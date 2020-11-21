<?php

namespace App\Listeners;

use App\Events\FirstLogin;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class SendFirstLoginEmailVerificationNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param FirstLogin $event
     * @return void
     */
    public function handle(FirstLogin $event)
    {
        if ($event->user instanceof MustVerifyEmail && ! $event->user->hasVerifiedEmail()) {
            $event->user->sendEmailVerificationNotification();
        }
    }
}
