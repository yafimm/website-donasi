@extends('layouts.app')

@section('content')

  @include('layouts.header')

  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">About</li>
      </ol>
    </nav>
    <div class="row">
      <div class="col-12 text-center py-3">
        <h1>About us</h1>
      </div>
      <div class="col-12 col-md-6 py-2">
        <img src="https://dummyimage.com/600x400/000/fff" class="img-fluid" alt="">
      </div>
      <div class="col-12 col-md-6 py-2">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </div>
    </div>
  </div>


@endsection
