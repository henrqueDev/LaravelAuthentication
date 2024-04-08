<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    function login(){
        return view('auth.login');
    }

    function auth(Request $request){
        $dados = $request->validate([
            "email" => ['required', 'email'],
            "password" => ['required']
        ]);

        if(Auth::attempt($dados, $request->filled('remember'))){
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return back()->withErrors([
            "email" => 'Usuário ou senha inválidos!'
        ]);
    }

    function logout(Request $request) {

        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome');
    }
}
