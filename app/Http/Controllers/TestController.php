<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topic;

use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function client()
    {
        return Http::withToken(env('PUSH_TOKEN'));
    }

    public function testUsers(Request $request)
    {
        return response(["users" => $this->users()], 200);
    }

    public function testAuth(Request $request)
    {
        return response(["token" => "mytoken", "user" => $this->users()[0]], 200);
    }

    public function testNotification(Request $request)
    {
        $topic = "/topics/users";
        $data = ['title' => 'from back', 'body' => 'test body'];

        try {
            $response = $this->client()->post("https://fcm.googleapis.com/fcm/send", [
                'to' => $topic,
                'notification' => $data,
                'data' => $data,
            ]);

            dd($response);

            return $response->json();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
