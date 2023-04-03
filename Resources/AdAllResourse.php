<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdAllResourse extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "text" => $this->text,
            "from" => $this->from,
            "until" => $this->until,
            "tags" => AdTagResourse::collection($this->tags)
        ];
    }
}
