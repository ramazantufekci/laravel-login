@extends('layouts/app-master')

@section('content')
<div class="row">
	<Ddiv class="class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2> Duzenle </h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-primary" href="{{ route('kayitlar.index') }}"> Back</a>
		</div>
	</div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
	<<strong>Hupps</strong> Birseyler yanlis gitti<br><br>
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<form action="{{ route('kayitlar.update',$kayitlar->id)}}" method="POST">
	@csrf
	@method('PUT')
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Malzeme:</strong>
				<input type="text" name="name" value="{{ $kayitlar->name }}" class="form-control">
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                                <strong>Adet:</strong>
                                <input type="number" name="adet" value="{{ $kayitlar->adet }}" class="form-control">
                        </div>
                </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                                <strong>Fiyat:</strong>
                                <input type="text" name="fiyat" value="{{ $kayitlar->fiyat }}" class="form-control">
                        </div>
                </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
	</div>
</form>
@endsection
