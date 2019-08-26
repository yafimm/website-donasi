@extends('layouts.app')

@section('content')

  @include('layouts.header')

  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sumbangan</li>
      </ol>
    </nav>
    <div class="row">
      @foreach($yayasan as $row)
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <img class="card-img-top" src="{{ ($row->foto) ?  asset('images/profile/'.$row->foto) : 'http://placehold.it/300x200' }}" alt="">
          <div class="card-body">
            <h4 class="card-title">{{ $row->nama }}</h4>
            <p class="card-text">{{str_limit($row->deskripsi, $limit = 150, $end = '...')}}</p>
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-6 col-sm-8">
                <a href="{{ route('sumbangan.show_user', $row->username) }}" class="btn btn-primary">Lihat detail</a>
              </div>
              <div class="col-6 col-sm-4">
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
	@if(isset($dhuafa))
		<div class="row">
			<div class="col-12 py-2	">
				<h3>Kaum Dhuafa</h3>
			</div>
			
			@foreach($dhuafa as $dhuafa)
				<div class="card col-md-3 col-sm-4 col-6" style="width: 18rem;">
				  <img src="..." class="card-img-top" alt="...">
				  <div class="card-body">
					<h5 class="card-title">{{ $dhuafa->nama }} </h5>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					<a href="{{ route('sumbangan.show_user', $dhuafa->yayasan->username) }}" class="btn btn-primary">Go somewhere</a>
				  </div>
				</div>
			@endforeach
		</div>
	@endif
  </div>
  <div class="d-flex justify-content-center">
    {{ $yayasan->links() }}
  </div>


@endsection
