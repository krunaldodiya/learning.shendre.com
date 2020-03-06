<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        $user = auth()->user();

        $file = $request->file('avatar');

        $filename = $file->store($user->id, 'public');

        User::where('id', $user->id)->update(['avatar' => $filename]);

        return response(['filename' => url($filename)], 200);
    }
}
