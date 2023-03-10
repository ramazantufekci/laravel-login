@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <div class="row">
		<div class="col">
			<a class="btn btn-primary" href="{{ route('kayitlar.create')}}" role="button">Yeni Kayit Olustur</a>
		</div>
	</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif
		<table class="table table-bordered">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Malzeme</th>
				<th scope="col">Adet</th>
				<th scope="col">Fiyat</th>
			</tr>
  		</thead>
		<tbody>
		@foreach($kayitlar as $kayit)
			<tr>
				<th scope="row">{{++$i}}</th>
				<td>{{ $kayit->name }}</td>
				<td>{{ $kayit->adet }}</td>
				<td>{{ $kayit->fiyat }}</td>
				<td>
					<form action="{{ route('kayitlar.destroy',$kayit->id) }}" method="POST">
						<a class="btn btn-info" href="{{ route('kayitlar.show',$kayit->id)}}">Goster</a>
						<a class="btn btn-primary" href="{{ route('kayitlar.edit',$kayit->id) }}">Duzenle</a>
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger">Sil</button>
					</form>
				</td>
			</tr>
		@endforeach
		</tbody>
		</table>
{!! $kayitlar->links() !!}
	</div>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection
