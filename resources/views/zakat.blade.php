@extends('layouts.app')

@section('content')

  @include('layouts.header')

  <div class="container">
    <div class="row py-2">
      <div class="col-12">
        <h1>Zakat Fitra</h1>
      </div>
      <div class="col-12 col-md-6 py-2">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </div>
      <div class="col-12 col-md-6 py-2">
        <img src="https://dummyimage.com/600x400/000/fff" class="img-fluid" alt="">
      </div>
    </div>
    <div class="row py-2">
      <div class="col-12 text-right">
        <h1>Zakat Mal</h1>
      </div>
      <div class="col-12 col-md-6 py-2">
        <img src="https://dummyimage.com/600x400/000/fff" class="img-fluid" alt="">
      </div>
      <div class="col-12 col-md-6 py-2">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </div>
      <div class="col-12 col-md-6 offset-md-3 text-center py-3">
        <a href="{{ route('zakat.create.user') }}" class="btn btn-lg btn-primary btn-block">Mulai Zakat</a>
      </div>
    </div>
  </div>


@endsection
