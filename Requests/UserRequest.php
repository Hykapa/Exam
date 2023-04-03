<?php

namespace App\Http\Requests;

class UserRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'patronymic' => 'nullable',
            'password' => 'required',
        ];
    }
}
