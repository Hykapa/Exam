<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    public function rules()
    {
        return [
            "name" => ['required', 'string'],
            "description" => ['required', 'string'],
            "path" => ['required', 'file', 'mimes:png, jpg, jpeg'],
        ];
    }
}
