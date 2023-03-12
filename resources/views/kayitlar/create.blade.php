@extends('layouts.app-master')

@section('content')
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Yeni KAyit</h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-primary" href="{{ route('kayitlar.index')}}">Geri</a>
		</div>
	</div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
	<strong>Yanlis</strong> Girdiginiz bilgilerde sorun var!<br><br>
	<ul>
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif

<form action="{{route('kayitlar.store')}}" method="POST">
	@csrf
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<strong>Malzeme:</strong>
			<input type="text" name="name" class="form-control" placeholder="Malzeme ismi">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
                        <strong>Adet:</strong>
                        <input type="number" name="adet" class="form-control" placeholder="">
                </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
                        <strong>Fiyat:</strong>
                        <input type="text" name="fiyat" class="form-control" placeholder="">
                </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
</form>


@endsection
