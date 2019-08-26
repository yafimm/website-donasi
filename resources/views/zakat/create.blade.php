@extends('layouts.dashboard')

@section('content')

  <div class="col-md-6 offset-md-3">
        <form class="" action="{{ route('zakat.store') }}" method="POST"  enctype="multipart/form-data">
          @csrf
          @method('post')
          @include('zakat.form')
        </form>
  </div>

@endsection
