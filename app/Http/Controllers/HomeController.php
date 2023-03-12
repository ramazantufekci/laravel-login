<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\View\View;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
class HomeController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function create( Request $request): mixed
    {
        //abort(404);
	return view('home/index',['name' => 'James']);
	//return View::make('home', ['name' => 'James']);
	//var_export( $request->hasValidSignature());
	//return URL::signedRoute('ramazan', ['user' => 1]);
    }

	
    public function index( Request $request): mixed
    {
        //abort(404);
        return view('home/index',['name' => 'James']);
        //return View::make('home', ['name' => 'James']);
        //var_export( $request->hasValidSignature());
        //return URL::signedRoute('ramazan', ['user' => 1]);
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request): never
    {
        abort(404);
    }

    /**
     * Display the resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
