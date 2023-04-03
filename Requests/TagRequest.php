<?php

namespace App\Http\Requests;

class TagRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string']
        ];
    }
}
