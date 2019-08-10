@extends('layouts.app')

@section('content')

  @include('layouts.header')

  <div class="col-md-6 offset-md-3">
        <form class="" action="{{ route('zakat.store.user') }}" enctype="multipart/form-data">
          @include('zakat.form')
        </form>
  </div>

@endsection
