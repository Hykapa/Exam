<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageResourse extends JsonResource
{
    public function toArray($request)
    {
        return [
            "name" => $this->name,
            "description" => $this->description,
            "url" => url('/public/storage') . "/" . $this->path
        ];
    }
}
