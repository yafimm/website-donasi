@extends('layouts.app')

@section('content')

  @include('layouts.header')

  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Zakat</li>
      </ol>
    </nav>
    <div class="row py-2">
      <div class="col-12">
        <h1>Zakat Fitrah</h1>
      </div>
      <div class="col-12 col-md-6 py-2">
        Zakat fitrah adalah zakat yang harus ditunaikan bagi seorang muzakki yang telah memiliki kemampuan untuk menunaikannya. Zakat fitrah adalah zakat wajib yang harus dikeluarkan sekali setahun yaitu saat bulan ramadhan menjelang idul fitri. Pada prinsipnya, zakat fitrah haruslah dikeluarkan sebelum sholat idul fitri dilangsungkan. Hal tersebut yang menjadi pembeda zakat fitrah dengan zakat lainnya.
        Zakat fitrah berarti menyucikan harta, karena dalam setiap harta manusia ada sebagian hak orang lain. Oleh karenanya, tidak ada suatu alasan pun bagi seorang hamba Allah yang beriman untuk tidak menunaikan zakat fitrah karena telah diwajibkan bagi setiap muslim, laki-laki maupun perempuan, orang yang merdeka atau budak, anak kecil atau orang dewasa. Ini perkara yang telah disepakati oleh para ulama.
      </div>
      <div class="col-12 col-md-6 py-2">
        <img src="https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1558606105/skpcj33zcvxjoqjqetzt.jpg" class="img-fluid" alt="">
      </div>
    </div>
    <div class="row py-2">
      <div class="col-12 text-right">
        <h1>Zakat Mal</h1>
      </div>
      <div class="col-12 col-md-6 py-2">
        <img src="https://pondokislami.com/wp-content/uploads/2018/06/pengertian-ketentuan-cara-menghitung-zakat-mal.jpg" class="img-fluid" alt="">
      </div>
      <div class="col-12 col-md-6 py-2">
        Menurut bahasa (lughat), harta adalah segala sesuatu yang diinginkan sekali sekali oleh manusia untuk memiliki, memanfaatkan dan menyimpannya.
        Menurut syar'a, harta adalah segala sesuatu yang dapat dimiliki (dikuasai) dan dapat digunakan (dimanfaatkan) menurut ghalibnya (lazim).

        Sesuatu dapat disebut dengan maal (harta) apabila memenuhi 2 (dua) syarat, yaitu:
        a. Dapat dimiliki, disimpan, dihimpun, dikuasai
        b. Dapat diambil manfaatnya sesuai dengan ghalibnya. Misalnya rumah, mobil, ternak, hasil pertanian, uang, emas, perak, dll.
    </div>
      <div class="col-12 col-md-6 offset-md-3 text-center py-3">
        <a href="{{ route('zakat.create.user') }}" class="btn btn-lg btn-primary btn-block">Mulai Zakat</a>
      </div>
    </div>
  </div>


@endsection
