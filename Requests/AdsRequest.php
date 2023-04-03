<?php

namespace App\Http\Requests;

class AdsRequest extends ApiRequest
{

    public function rules()
    {
        return [
            'user_id' => [],
            'contractor_id' => [],
            'title' => ['required', 'string', 'max:150'],
            'text' => ['required', 'string'],
            'from' => ['required', 'date_format:d.m.Y', 'after:today'],
            'until' => ['required', 'date_format:d.m.Y', 'after:from'],
            'tags' => ['required', 'array'],
        ];
    }
}
