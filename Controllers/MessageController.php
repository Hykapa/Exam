<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Http\Resources\AllMessageResourse;
use App\Http\Resources\MessageResourse;
use App\Models\Application;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Application $id, Request $request)
    {
        return response()->json([
            'data' => ['items' => AllMessageResourse::collection(Message::find($id))]
        ], 200);
    }

    public function store(Application $id, MessageRequest $request)
    {
        $message = Message::create(
            ['application_id' => $id['id'],
                'user_id' => $request->user_id,
                'text' => $request->text]);

        return response()->json([
            'data' => new MessageResourse($message)
        ], 201);
    }

    public function show($id)
    {
        return response()->json([
            'data' => new AllMessageResourse(Message::find($id))
        ], 200);
    }
}
