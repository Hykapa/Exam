<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Http\Resources\ApplicationResourse;
use App\Models\Ad;
use App\Models\Ads;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function store(Ad $id, ApplicationRequest $request)
    {
        $temp = $request->validated();
        $application = Application::create([
            'ad_id' => $id['id'],
            'user_id' => $temp['user_id'],
            'price' => $temp['price']
        ]);
        return response()->json([
            'data' => new ApplicationResourse($application)
        ], 201);
    }

    public function show(Application $application)
    {
        return [
            "id" => $application->id,
            "ads" => $application->ads,
            "user" => $application->users,
            "price" => $application->price,
        ];
    }
}
