<?php

namespace App\Http\Resources;

use App\Models\Message;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResourse extends JsonResource
{
    public function toArray($request)
    {
        $mes = Message::find($this->id);
        return [
            'id' => $this->id,
            'text' => $this->text,
            'user' => [
                'id' => $mes->user->id,
                'name' => $mes->user->first_name . " " . $mes->user->last_name
            ],
            'created_at' => $this->created_at
        ];
    }
}
