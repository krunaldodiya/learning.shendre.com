<?php

namespace App\Repositories;

use App\Topic;
use App\User;
use Illuminate\Support\Facades\Http;

class PushNotificationRepository implements PushNotificationRepositoryInterface
{
    public function client()
    {
        return Http::withToken(env('PUSH_TOKEN'));
    }

    public function notify($topic, $data)
    {
        try {
            $response = $this->client()->post("https://fcm.googleapis.com/fcm/send", [
                'to' => $topic,
                'notification' => $data,
                'data' => $data,
            ]);

            return $response->json();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
