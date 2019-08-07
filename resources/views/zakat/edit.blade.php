@extends('layouts.dashboard')

@section('content')

  <div class="col-md-6 offset-md-3">
        <form class="" action="{{ route('zakat.update', $zakat->id) }}" enctype="text/plain">
          @include('zakat.form')
        </form>
  </div>

@endsection
