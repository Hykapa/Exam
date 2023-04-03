<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageNameResourse extends JsonResource
{
    public function toArray($request)
    {
        return url('/public/storage') . "/" . $this->path;
    }
}
