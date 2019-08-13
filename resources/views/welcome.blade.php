@extends('layouts.app')

@section('content')

  @include('layouts.header')
    <!-- Page Content -->
    <div class="container">

      <div class="row">
        <div class="col-md-7 mb-5 col-sm-6 col-12">
          <h2>What We Do</h2>
          <hr>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>
        </div>
        <div class="col-md-5 mb-5 col-sm-6 col-12">
          <h2>Recent Donatur</h2>
          <hr>
          <ul class="list-group">
            @foreach($recent_donatur as $donatur)
              <li class="list-group-item list-group-item-action flex-column align-items-start">
                 <div class="d-flex w-100 justify-content-between">
                   <h5 class="mb-1">  {{ $donatur->pengirim->username }}</h5>
                   <small>{{ $donatur->created_at->diffForHumans() }}</small>
                 </div>
               </li>
            @endforeach
          </ul>
        </div>
      </div>
      <!-- /.row -->

      <div class="row">
        @foreach($yayasan as $row)
        <div class="col-md-4 mb-5">
          <div class="card h-100">
            <img class="card-img-top" src="{{ ($row->foto) ?  asset('images/profile/'.$row->foto) : 'http://placehold.it/300x200' }}" alt="">
            <div class="card-body">
              <h4 class="card-title">{{ $row->nama }}</h4>
              <p class="card-text">{{str_limit($row->deskripsi, $limit = 150, $end = '...')}}</p>
            </div>
            <div class="card-footer">
              <a href="{{ route('sumbangan.show_user', $row->username) }}" class="btn btn-primary">Lihat detail!</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

@endsection
