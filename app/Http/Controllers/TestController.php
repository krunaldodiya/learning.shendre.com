<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function users()
    {
        $comments = [
            ['id' => 1, 'post_id' => 1, "post" => ['id' => 1, "title" => "krunal post title", "body" => "krunal post body"], "comment" => "hello"],
            ['id' => 2, 'post_id' => 2, "post" => ['id' => 2, "title" => "kalpit post title", "body" => "kalpit post body"], "comment" => "hello"]
        ];

        $posts = [
            ['id' => 1, "user_id" => 1, "owner" => ['id' => 1, "name" => "krunal"], "title" => "krunal post title", "body" => "krunal post body", "comments" => $comments],
            ['id' => 2, "user_id" => 2, "owner" => ['id' => 2, "name" => "kalpit"], "title" => "kalpit post title", "body" => "kalpit post body", "comments" => $comments]
        ];

        return [
            ['id' => 1, "name" => "krunal", "posts" => $posts],
            ['id' => 2, "name" => "kalpit", "posts" => $posts]
        ];
    }

    public function testUsers(Request $request)
    {
        return response(["users" => $this->users()], 200);
    }

    public function testAuth(Request $request)
    {
        return response(["token" => "mytoken", "user" => $this->users()[0]], 200);
    }
}
