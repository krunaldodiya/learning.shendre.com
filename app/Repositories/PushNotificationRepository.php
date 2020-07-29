<?php

namespace App\Repositories;

use App\Topic;
use App\User;
use Illuminate\Support\Facades\Http;

class PushNotificationRepository implements PushNotificationRepositoryInterface
{
    public function client()
    {
        return Http::withToken("key=AAAA4WPY130:APA91bHedk1D_UGK2bg_A_UJY3xWt0u6AnHvoQBXQWA3w68VHHDNu-tUN7k03Moc2VE85fbTxCGu-qQURpSbrbfO7bDH1MeFs3vmVuQQYIBZHFREIN3jrduyBGk_GK99YmQOdCwY49Mb");
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
