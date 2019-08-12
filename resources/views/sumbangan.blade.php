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
            <a href="{{ route('sumbangan.show_user', $row->username) }}" class="btn btn-primary">Lihat detail</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <div class="d-flex justify-content-center">
    {{ $yayasan->links() }}
  </div>


@endsection
