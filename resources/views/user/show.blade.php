@extends('layouts.dashboard')

@section('content')

  <div class="col-md-8 offset-md-2">
    <div class="row my-3">
      <div class="col-12 text-center py-3">
        <h2>Detail User</h2>
      </div>
      <div class="col-md-6 img">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvzOpl3-kqfNbPcA_u_qEZcSuvu5Je4Ce_FkTMMjxhB-J1wWin-Q"  alt="" class="img-rounded">
      </div>
      <div class="col-md-6 details">
          <blockquote>
              <h5>{{ $user->nama }}</h5>
              <small><cite title="Source Title">{{ $user->username }}<i class="icon-map-marker"></i></cite></small>
          </blockquote>
          <ul class="list-group">
            <li class="list-group-item disabled">{{ $user->gender }} </li>
            <li class="list-group-item">{{ $user->email }} </li>
            <li class="list-group-item">{{ $user->no_telp }}</li>
            <li class="list-group-item">{{ $user->created_at->format('d M Y') }}</li>
          </ul>
      </div>
    </div>
  </div>

@endsection
