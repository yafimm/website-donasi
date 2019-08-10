@extends('layouts.dashboard')

@section('content')

  <div class="col-md-8 offset-md-2">

    <!-- Portfolio Item Heading -->
    <h3 class="my-4">Zakat Detail ID {{ $zakat->id }}</h3>

    <!-- Portfolio Item Row -->
    <div class="row">

      <div class="col-md-6">
        <img class="img-fluid" src="http://placehold.it/600x400" alt="">
      </div>

      <div class="col-md-6">
        <h3 class="my-3">Zakat deskripsi</h3>
        <ul>
          <li>Jenis Zakat : {{ $zakat->jenis_donasi->nama }}</li>
          <li>Pengirim : {{ $zakat->pengirim->username }}</li>
          <li>Penerima : {{ ($zakat->penerima) ? $zakat->penerima->username : '-' }}</li>
          <li>Status : {{ $zakat->status }}</li>
        </ul>
        <p>{{ $zakat->deskripsi }}</p>
      </div>
      <div class="col-12 col-md-8 offset-md-2 py-3">
        @if($zakat->status === 'Belum Selesai')
        <form class="" action="{{ route('zakat.update.status') }}" method="post">
          @csrf
          @method('post')
          <input type="hidden" name="id" value="{{ $zakat->id }}">
          <button type="submit" class="btn btn-success btn-block">Selesaikan transaksi</button>
        </form>
        @endif
      </div>

    </div>

  </div>

@endsection