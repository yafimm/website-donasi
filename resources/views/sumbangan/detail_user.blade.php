@extends('layouts.app')

@section('content')

  @include('layouts.header')

  <div class="col-md-12 my-4">
    <div class="row">
      <div class="col-12 col-md-8 offset-md-2">
        @include('_partial.flash_message')
      </div>
      <div class="col-md-6 col-12">
        <img src="https://dummyimage.com/600x400/000/fff" class="img-fluid" alt="">
      </div>
      <div class="col-md-6 col-12">
        <h2>{{ $yayasan->nama }}</h2>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </div>
    </div>
  </div>

  <div class="col-md-6 offset-md-3">
          <h3>Sumbangan</h3>
        @include('sumbangan.create_user')
  </div>

@endsection
