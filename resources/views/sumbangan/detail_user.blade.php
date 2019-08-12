@extends('layouts.app')

@section('content')

  @include('layouts.header')

  <div class="col-md-12 my-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/sumbangan') }}">Sumbangan</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('') }}">Home</a></li>
      </ol>
    </nav>
    <div class="row">
      <div class="col-12 col-md-8 offset-md-2">
        @include('_partial.flash_message')
      </div>
      <div class="col-md-6 col-12">
        <img src="{{ ($yayasan->foto) ? asset('images/profile/'.$yayasan->foto) : 'https://dummyimage.com/600x400/000/fff'  }}" class="img-fluid" alt="">
      </div>
      <div class="col-md-6 col-12">
        <div class="d-flex w-100 justify-content-between">
           <h2 class="mb-1">{{ $yayasan->nama }}</h2>
           <small>{{ $yayasan->username }}</small>
        </div>
        <p class="mb-1">{{ $yayasan->deskripsi }}</p>
        <small>Rekening : {{ $yayasan->no_rekening}} </small> ||
        <small>Kontak : {{ $yayasan->no_telp}} </small>

      </div>
    </div>
  </div>

  @if(Auth::check())
  <div class="col-md-6 offset-md-3">
          <h3>Sumbangan</h3>
        @include('sumbangan.create_user')
  </div>
  @else
  <div class="col-md-6 offset-md-3">
    <a href="{{ url('/login') }}" class="btn btn-success btn-block">Login terlebih dahulu untuk menyumbang</a>
  </div>
  @endif


@endsection
