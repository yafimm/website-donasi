@extends('layouts.dashboard')

@section('content')

  <div class="col-md-8 offset-md-2">

    <!-- Portfolio Item Heading -->
    <h3 class="my-4">Sumbangan Detail ID {{ $sumbangan->id }}</h3>

    <!-- Portfolio Item Row -->
    <div class="row">

      <div class="col-md-6">
        <img class="img-fluid" src="{{ asset('images/donasi/'.$sumbangan->gambar) }}" alt="">
      </div>

      <div class="col-md-6">
        <h3 class="my-3">Zakat deskripsi</h3>
        <ul>
          <li>Jenis Zakat : {{ $sumbangan->jenis_donasi->nama }}</li>
          <li>Pengirim : {{ $sumbangan->pengirim->username }}</li>
          <li>Penerima : {{ ($sumbangan->penerima) ? $sumbangan->penerima->username : '-' }}</li>
          <li>Status : {{ $sumbangan->status }}</li>
        </ul>
        <p>{{ $sumbangan->deskripsi }}</p>
      </div>
      <div class="col-12 col-md-8 offset-md-2 py-3">
        @if($sumbangan->status === 'Belum Selesai' && \Auth::user()->isYayasan())
        <form class="" action="{{ route('sumbangan.update.status') }}" method="post">
          @csrf
          @method('post')
          <input type="hidden" name="id" value="{{ $sumbangan->id }}">
          <button type="submit" class="btn btn-success btn-block">Selesaikan transaksi</button>
        </form>
        @endif
      </div>
    </div>
  </div>

@endsection
