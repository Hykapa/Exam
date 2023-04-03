<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Http\Resources\ImageResourse;
use App\Models\Ad;
use App\Models\Image;

class ImageController extends Controller
{
    public function store(ImageRequest $request, Ad $id)
    {
        $temp = $request->validated();
        $filename = $request->file('path')->store('/', 'public');
        $image = Image::create([
            'ad_id' => $id['id'],
            'name' => $temp['name'],
            'description' => $temp['description'],
            'path' => $filename
        ]);
        return response()->json([
            'data' => new ImageResourse($image)
        ], 201);
    }
}
