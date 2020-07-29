<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function updateProfile(UpdateProfile $request)
    {
        $notifications = Notification::paginate(100);

        return response(['notifications' => $notifications], 200);
    }
}
