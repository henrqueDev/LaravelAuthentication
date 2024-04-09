<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{

    /*
        function __construct()
        {
            $this->middleware('auth');
        }
    */



    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = $request->user();
        $name = $user ? $user->name : null ;
        return view('home', ['name' => $name]);
    }
}
