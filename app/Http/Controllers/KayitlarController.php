<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kayitlar;
class KayitlarController extends Controller
{
    public function index()
    {
	$kayitlar = Kayitlar::latest()->paginate(5);
        return view("kayitlar.index",compact('kayitlar'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function create()
    {
        return view('kayitlar.create');
    }

    public function store(Request $request)
    {
	$request->validate([
		'name' => 'required',
		'adet' => 'required',
		'fiyat' => 'required'		
	]);
	Kayitlar::create($request->all());
	return redirect()->route('kayitlar.index')->withSuccess('Kayit yapildi');
    }

    public function show(Kayitlar $kayitlar)
    {
        return view('kayitlar.show',compact('kayitlar'));
    }

    public function edit(Kayitlar $kayitlar)
    {
        return view('kayitlar.edit',compact('kayitlar'));
    }

    public function update(Request $request,Kayitlar $kayitlar)
    {
        $request->validate([
                'name' => 'required',
                'adet' => 'required',
                'fiyat' => 'required'
        ]);
        $kayitlar->update($request->all());
        return redirect()->route('kayitlar.index')->withSuccess('Kayit guncellendi');
    }

    public function destroy(Kayitlar $kayitlar)
    {
        $kayitlar->delete();
	return redirect()->route('kayitlar.index')->withSuccess('Kayit silindi');
    }




}
