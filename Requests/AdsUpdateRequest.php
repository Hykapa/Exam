<?php

namespace App\Http\Requests;

class AdsUpdateRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'user_id' => [],
            'title' => ['string', 'max:150'],
            'text' => ['string'],
            'from' => ['date_format:d.m.Y', 'after:today'],
            'until' => ['date_format:d.m.Y', 'after:from'],
            'tags' => ['array']
        ];
    }
}
