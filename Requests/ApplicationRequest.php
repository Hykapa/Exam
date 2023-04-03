<?php

namespace App\Http\Requests;

class ApplicationRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'user_id' => [],
            'price' => ['required', 'numeric'],
        ];
    }
}
