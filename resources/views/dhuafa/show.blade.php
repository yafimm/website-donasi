@extends('layouts.dashboard')

@section('content')

  <div class="col-md-8 offset-md-2">
    <div class="row my-3">
      <div class="col-12 text-center py-3">
        <h2>Detail Dhuafa</h2>
      </div>
      <div class="col-md-6 img">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvzOpl3-kqfNbPcA_u_qEZcSuvu5Je4Ce_FkTMMjxhB-J1wWin-Q"  alt="" class="img-rounded">
      </div>
      <div class="col-md-6 details">
          <blockquote>
              <h5>{{ $dhuafa->nama }}</h5>
          </blockquote>
          <ul class="list-group">
            <li class="list-group-item disabled">{{ $dhuafa->gender }} </li>
            <li class="list-group-item">{{ $dhuafa->no_telp }}</li>
            <li class="list-group-item">{{ $dhuafa->alamat }} </li>
          </ul>
      </div>
    </div>
  </div>

@endsection
