<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topic;

use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function client()
    {
        return Http::withHeaders([
            'Authorization' => 'key=AAAAJzAo3x4:APA91bHo0N5Bbn2igJm5d1v6CJp3jLqT9X0r-wCNOxi-ekla4ybSrIC8OA85SGRRjYvdCR_z25WfZUOGp9w7UBwb4nWoAzOCgRLoK151FNCSVzPkPozurYn_Fn7mO1wj7p55MSew0urR',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ]);
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

            dd($response->json());

            return $response->json();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
