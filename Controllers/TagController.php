<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Http\Resources\TagResourse;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        return response()->json(['data' => ['items' => TagResourse::collection(Tag::all())]], 200);
    }

    public function store(TagRequest $request)
    {
        return response()->json([
            'data' => new TagResourse(Tag::create($request->validated())
            )], 201);
    }

    public function update(Tag $tag, TagRequest $request)
    {
        $tag->update($request->validated());
        return response()->json([
            'data' => new TagResourse($tag)
        ], 201);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->noContent();
    }
}
