<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
	return view("auth.login");
    }

    public function login(Request $request)
    {
	if(Auth::attempt($request->only('email','password'))){
		return redirect()->route('ramazan');
        }
        return view("auth.login");
    }

    public function logout()
    {
        Auth::logout();
	return redirect()->route('login.show');
    }

}
