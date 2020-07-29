<?php

namespace App\Listeners;

use App\Events\NotificationWasCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPushNotification
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
     * @param  NotificationWasCreated  $event
     * @return void
     */
    public function handle(NotificationWasCreated $event)
    {
        \dump($event);
    }
}
