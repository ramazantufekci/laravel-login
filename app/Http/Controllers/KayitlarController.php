<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KayitlarController extends Controller
{
    public function show()
    {
        return view("kayitlar.index");
    }
}
