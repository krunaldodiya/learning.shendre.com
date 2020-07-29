<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Notification;

class NotificationController extends Controller
{
    public function updateProfile(UpdateProfile $request)
    {
        $notifications = Notification::paginate(100);

        return response(['notifications' => $notifications], 200);
    }
}
