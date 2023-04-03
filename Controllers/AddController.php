<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdsRequest;
use App\Http\Requests\AdsUpdateRequest;
use App\Http\Resources\AdAllResourse;
use App\Http\Resources\AdResourse;
use App\Http\Resources\OneAdsResourse;
use App\Http\Resources\UpdateAdsResourse;
use App\Models\Ad;
use App\Models\Adtags;

class AddController extends Controller
{

    public function index()
    {
        return response()->json(['data' => ['items' => AdAllResourse::collection(Ad::all())]], 200);
    }

    public function store(AdsRequest $request)
    {
        $ads = Ad::create($request->validated());

        foreach ($request->tags as $tag) {
            AdTags::create([
                'ad_id' => $ads['id'],
                'tag_id' => $tag
            ]);
        }
        return response()->json([
            'data' => new AdResourse($ads)
        ], 201);
    }

    public function show(Ad $id)
    {
        return response()->json([
            'data' => OneAdsResourse::collection(Ad::find($id))
        ], 200);
    }


    public function update(Ad $id, AdsUpdateRequest $request)
    {
        $id->update($request->validated());

        AdTags::where('ad_id', $id['id'])->delete();
        foreach ($request->tags as $tag) {
            AdTags::create([
                'ad_id' => $id['id'],
                'tag_id' => $tag
            ]);
        }

        return response()->json([
            'data' => new UpdateAdsResourse($id)
        ], 200);
    }


    public function destroy(Ad $ads)
    {
        $ads->delete();
        return response()->noContent();
    }
}
