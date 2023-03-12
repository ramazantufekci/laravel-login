<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KayitlarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Auth::routes(['verify'=> true]);
Route::get('/',[HomeController::class, 'create'])->name("ramazan");
/*
Route::get('/kayitlar',[KayitlarController::class, 'index'])->name('kayitlar');
Route::get('/kayitlar/olustur',[KayitlarController::class, 'create'])->name('kayitlar.create');
Route::post('/kayitlar/olustur',[KayitlarController::class, 'store'])->name('kayitlar.store');
Route::post('/kayitlar/sil',[KayitlarController::class, 'store'])->name('kayitlar.store');
*/

Route::get('email/verify',[App\Http\Controllers\Auth\VerificationController::class,'show'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}',[App\Http\Controllers\Auth\VerificationController::class,'verify'])->middleware(['auth','signed'])->name('verification.verify');
Route::post('/email/verification-notification',[App\Http\Controllers\Auth\VerificationController::class,'resend'])->middleware(['auth','throttle:6,1'])->name('verification.send');

Route::resource('kayitlar',KayitlarController::class);

Route::group(['namespace' => 'App\Http\Controllers\Auth'], function()
{   
    /**
     * Home Routes
     */
    //Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LoginController@logout')->name('logout.perform');
    });
});
