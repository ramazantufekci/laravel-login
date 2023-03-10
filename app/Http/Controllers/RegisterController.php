<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    public function register(Request $request){
	$rule = ['username'=>'required','email'=>'required|email:rfc,dns|unique:users','password'=>'required'];
	$request->validate($rule);
	User::create(['name'=>$request->username,
			'email'=>$request->email,
			'password'=> Hash::make($request->password)
	]);
	return redirect()->route("login.show");

    }

    public function show(Request $request){
//        dump($request->all());
        return view("auth.register");

    }

}
