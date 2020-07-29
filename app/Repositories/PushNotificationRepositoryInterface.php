<?php

namespace App\Repositories;

interface PushNotificationRepositoryInterface
{
    public function notify($topic, $data);
}
