<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getMediaFile(Request $request)
    {
        $media = $request->media;
        $file = $request->file;

        if ($file) {
            return response()->file("storage/{$file}");
        }

        return response()->file("storage/{$media}.png");
    }
}
