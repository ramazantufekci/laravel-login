<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

Class VerificationController extends Controller
{
    use VerifiesEmails;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('auth')->except(['verify']);
        $this->middleware('signed')->only(['verify']);
        $this->middleware('throttle:6,1')->only(['verify','resend']);
    }

    public function show(Request $request)
    {
        
        if($request->user()->hasVerifiedEmail()){
            return redirect($this->redirectPath());
        }
        return view('auth.verify');
    }

    public function verify(Request $request)
    {
        $user = User::find($request->route('id'));
        Log::error(redirect($this->redirectPath()));
        if(! hash_equals((string)$request->route('hash'),sha1($user->getEmailForVerification()))){
            throw new AuthorizationException;
        }
        if($user->hasVerifiedEmail()){
            return redirect($this->redirectPath());
        }

        $user->markEmailAsVerified();
        evet(new Verified($user));
        return redirect($this->redirectPath())->with('verified',true);
    }

    public function resend(Request $request)
    {
        if($request->user()->hasVerifiedEmail()){
            return redirect($this->redirectPath());
        }
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status','Doğrulama maili gönderildi');
    }

}