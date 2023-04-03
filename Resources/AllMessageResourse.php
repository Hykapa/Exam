<?php

namespace App\Http\Resources;

use App\Models\Message;
use Illuminate\Http\Resources\Json\JsonResource;

class AllMessageResourse extends JsonResource
{
    public function toArray($request)
    {
        $mess = Message::find($this->id);
        return [
            'id' => $this->id,
            'text' => $this->text,
            'user' => [
                "id" => $mess->id,
                "name" => $mess->last_name . " " . $mess->first_name
            ],
            'created_at' => $this->created_at
        ];
    }
}
