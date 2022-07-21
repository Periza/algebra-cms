<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected function validator(array $data) {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data) {
        $user = User::create(['name' => $data['name'], 'email' => $data['email'], 'password' => Hash::make($data['password']), 'role_id' => 4]);
    }
}
