@extends('layouts/app-master')
@section('content')
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Goster</h2>
		</div>
		<div class="pull-rÄight">
			<a class="btn btn-primary" href="{{ route('kayitlar.index')}}"> Geri</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Malzeme:</strong>
			{{$kayitlar->name}}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                        <strong>Adet:</strong>
                        {{$kayitlar->adet}}
                </div>
        </div>

	<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                        <strong>Fiyat:</strong>
                        {{$kayitlar->fiyat}}
                </div>
        </div>
</div>
@endsection

