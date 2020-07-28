<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class SendFeedback extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'subject' => 'required',
            'message' => 'required',
            'user_id' => 'required|exists:users:id'
        ];
    }

    public function response(array $errors)
    {
        return new JsonResponse($errors, 422);
    }
}
