<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdTagResourse extends JsonResource
{
    public function toArray($request)
    {
        return $this->name;
    }
}
