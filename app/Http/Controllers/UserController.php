<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('login');
    }

    public function auth(Request $request){

        // if($request->has())
 
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) { 
            return view('home');
        }else {
             dd('nao logado');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
