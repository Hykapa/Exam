<?php

namespace App\Http\Resources;

use App\Models\Ad;
use Illuminate\Http\Resources\Json\JsonResource;

class AdResourse extends JsonResource
{
    public function toArray($request)
    {
        $add = Ad::find($this->id);
        return [
            "id" => $this->id,
            "title" => $this->title,
            "text" => $this->text,
            "from" => $this->from,
            "until" => $this->until,
            "tags" => AdTagResourse::collection($this->tags),
            'user' => ['id' => $add->user_id,
                'name' => $add->users->first_name . " " . $add->users->last_name],
            'contractor' => [
                'id' => $this->contractor_id,
                'name' => $add->contractor->first_name . " " . $add->contractor->last_name]
        ];
    }
}
