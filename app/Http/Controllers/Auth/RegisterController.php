<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function register(Request $request){
	$rule = ['username'=>'required','email'=>'required|email:rfc,dns|unique:users','password'=>'required'];
	$request->validate($rule);
	$user = User::create(['name'=>$request->username,
			'email'=>$request->email,
			'password'=> Hash::make($request->password)
	]);
	event(new Registered($user));
	$user->sendEmailVerificationNotification();
	return redirect(route('login.show'))->with('status','Lütfen Email adresinizi Doğrulayın');

    }

    public function show(Request $request){
//        dump($request->all());
        return view("auth.register");

    }

}
