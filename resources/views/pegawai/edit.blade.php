@extends('layouts.dashboard')

@section('content')

  <div class="col-md-6 offset-md-3">
        <form class="" action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
          @method('PUT')
          @CSRF
          @include('pegawai.form')
        </form>
  </div>

@endsection
