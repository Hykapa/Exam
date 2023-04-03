<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResourse extends JsonResource
{
    public function toArray($request)
    {
        return [
            'token' => []
        ];
    }
}
