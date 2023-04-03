<?php

namespace App\Http\Resources;

use App\Models\Application;
use Illuminate\Http\Resources\Json\JsonResource;

class OneApplicatonResourse extends JsonResource
{
    public function toArray($request)
    {
        $add = Application::find($this->id);
        return [
            'id' => $this->id,
            'user' => $add->users->first_name . " " . $add->users->last_name,
            'price' => $this->price
        ];
    }
}
