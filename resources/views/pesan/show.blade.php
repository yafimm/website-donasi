@extends('layouts.app')

@section('content')

    <div class="container py-5">
      <div class="row">
        <div class="col-12 col-md-6 offset-md-3 text-center py-3">
          <h3>Bantuan dan Keluhan #{{ $pesan->id }}</h3>
          <h5>{{ $pesan->user->username }} - {{ $pesan->status }}</h5>
        </div>
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2">
          @foreach($all_pesan as $row)

            @if($row->id_user == Auth::user()->id)
            <div class="col-12 col-md-5 rounded offset-md-7 my-2 py-2 text-right border border-secondary">
              <p class="mb-1">{{ $row->isi_pesan }}</p>
              <small>Me - {{ $row->created_at->diffForHumans()  }}</small>
            </div>
            @else
            <div class="col-12 col-md-5 rounded my-2 py-2 text-left text-white bg-info">
              <small class="text-warning">{{ $row->user->username }}</small>
              <p class="mb-1">{{ $row->isi_pesan }}</p>
              <small>{{ $row->user->role->nama_role }} - {{ $row->created_at->diffForHumans()  }}</small>
            </div>
            @endif

          @endforeach

        </div>
          <div class="col-12 col-md-6 offset-md-3 py-3">
            @if($pesan->status == 'Belum Selesai')
              <form action="{{ route('pesan.update', $pesan->id) }}" method="POST">
                @method('PUT')
                @CSRF
                <div class="form-group row">
                    <textarea name="isi_pesan" class="form-control" placeholder="Ketikkan pesan" rows="5" cols="80"></textarea>
                </div>
                <p class="lead">
                  <button class="btn btn-primary btn-block" href="#" type="submit">Kirim</button>
                </p>
              </form>
              @if(Auth::user()->isAdmin() || Auth::user()->isHelpdesk())
              <form class="" action="{{ route('pesan.update.status', $pesan->id) }}" method="post">
                @method('POST')
                @CSRF
                <p class="lead">
                  <button class="btn btn-success btn-block" href="#" type="submit">Selesaikan Tiket Bantuan</button>
                </p>
              </form>
              @endif
            @else
              PESAN INI SUDAH DITUTUP
            @endif
        </div>
      </div>
    </div>


@endsection
