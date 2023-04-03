<?php

namespace App\Http\Resources;

use App\Models\Application;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResourse extends JsonResource
{
    public function toArray($request)
    {
        $app = Application::find($this->id);
        return [
            'id' => $this->id,
            'ad' => ['id' => $app->ad->id, 'name' => $app->ad->title],
            'price' => $this->price
        ];
    }
}
