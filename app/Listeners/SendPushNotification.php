<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Events\NotificationWasCreated;

use App\User;

use App\Repositories\PushNotificationRepository;

use Illuminate\Support\Facades\Storage;

class SendPushNotification
{
    public $pushNotificationRepository;

    public function __construct(PushNotificationRepository $pushNotificationRepository)
    {
        $this->pushNotificationRepository = $pushNotificationRepository;
    }

    /**
     * Handle the event.
     *
     * @param  NotificationWasCreated  $event
     * @return void
     *
     *
     */
    public function handle(NotificationWasCreated $event)
    {
        $notification = $event->notification;

        dump(Storage::url($notification['image']));


        $this->pushNotificationRepository->notify("/topics/users", [
            'notification' => $notification,
            'title' => $notification['title'],
            'body' => $notification['description'],
            // 'image' => Storage::url($notification['image']),
            'image' => "https://resize.indiatvnews.com/en/resize/newbucket/715_-/2020/05/pjimage-5-1589546097.jpg",
        ]);
    }
}
