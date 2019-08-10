@extends('layouts.app')

@section('content')

  @include('layouts.header')
  <div class="col-md-6 offset-md-3">
        @include('_partial.flash_message')
        <form class="" action="{{ route('zakat.store.user') }}" method="POST" enctype="multipart/form-data">
          @CSRF
          @method('POST')
          @include('zakat.form')
        </form>
  </div>

@endsection
