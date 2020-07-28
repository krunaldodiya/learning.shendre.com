<?php

namespace App\Http\Controllers;

use App\Feedback;

use App\Http\Requests\Feedback;

class FeedbackController extends Controller
{
    public function send(Feedback $request)
    {
        $feedback = Feedback::create($request->all());

        return response(['status' => true], 200);
    }
}
