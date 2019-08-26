@extends('layouts.app')

@section('content')

  @include('layouts.header')
    <!-- Page Content -->
    <div class="container">

      <div class="row">
        <div class="col-md-7 mb-5 col-sm-6 col-12">
          <h2>BANTU</h3>
          <hr>
          <p>Indonesia adalah negara yang sangat luas, serta memiliki banyak penduduk yang tersebar luas di seluruh pulaunya. Indonesia pun adalah negara yang memang mempunyai kekayaan luar biasa didalamnya. dan tak ketinggalan indonesia pun mempunyai segudang masalah yang sampai saat ini masih coba di atasi, salah satu nya adalah kesetaraan sosial, dan memang indonesia adalah negara yang banyak kepulauaan dan tidak tersebar luas pemberdayaannya. pemerintah pun berusaha untuk bagi mana mengatasi tentang keadilan sosial bagi seluruh rakyat indonesia dari kemiskinan.</p>
          <p>Karena kemiskinan memang menjadi salah satu persoalan yang cukup serius, banyak organisasi atau kelompok yang sudah coba membantu untuk bergotong royong mengatasi masalah kemanusiaan ini, tapi memang banyak sekali permasalahan yang di hadapi, salah satu contoh besar yaitu negara ini cukup luas dan besar. untuk itu kami berusaha semaksimal munngkin menciptakan inovasi untuk menyentuh daerah-daerah yang sulit dijangkau oleh manusia langsung untuk membantunya.</p>
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
