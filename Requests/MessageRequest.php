<?php

namespace App\Http\Requests;

class MessageRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'user_id' => [],
            'text' => ['required', 'string'],
        ];
    }
}
