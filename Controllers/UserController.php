<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResourse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return UserResourse::collection(User::all());
    }

    public function store(UserRequest $request)
    {
        return response()->json([
            'data' => new UserResourse(User::create([
                    'password' => Hash::make($request->password),
                ] + $request->validated())
            )], 201);
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            Auth::user()->tokens()->delete();
            return response()->json([
                'token' => Auth::user()->createToken('api')->plainTextToken
            ]);
        }
        return response()->json([
            'message' => 'Пользователь не найден!'
        ]);
    }

    public function show($id)
    {
        return User::find($id);
    }
}
