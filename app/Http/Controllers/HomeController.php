<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function login() :View
    {
        return view('login');
    }
    public function doLogin(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
            );
            if(Auth::attempt($credentials))
            {
                return to_route('home');
            }else
            {
                dd($credentials);
            }
    }
}
