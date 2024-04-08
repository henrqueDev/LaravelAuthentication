<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function create() {
        return view('auth.register');
    }

    function store(Request $request) {
        $request->validate(
            [
                "name" => ['required', 'string', 'max:255'],
                "email" => ['required', 'string', 'email', 'max:255', 'unique:users'],
                "password" => ['required', 'string', 'min:8', 'confirmed']
            ]
        );

        User::create(
            $request->only(['name', 'email', 'password', 'password_confirmation'])
        );

        return redirect()->route('home');

    }
    
}
