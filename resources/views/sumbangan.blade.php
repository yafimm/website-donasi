@extends('layouts.app')

@section('content')

  @include('layouts.header')

  <div class="container">
    <div class="row">
      @foreach($yayasan as $row)
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <img class="card-img-top" src="http://placehold.it/300x200" alt="">
          <div class="card-body">
            <h4 class="card-title">{{ $row->nama }}</h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus.</p>
          </div>
          <div class="card-footer">
            <a href="{{ route('sumbangan.show.user', $row->username) }}" class="btn btn-primary">Lihat detail</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>


@endsection
