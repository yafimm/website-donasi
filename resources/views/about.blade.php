@extends('layouts.app')

@section('content')

  @include('layouts.header')

  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">About</li>
      </ol>
    </nav>
    <div class="row">
      <div class="col-12 text-center py-3">
        <h1>About us</h1>
      </div>
      <div class="col-12 col-md-6 py-2">
        <img src="C:\backup adam\kuliah\semester 6\website-donasi\resources\logo.png" class="" alt="">
      </div>
      <div class="col-12 col-md-6 py-2">
        BANTU application adalah tools untuk membantu yayasan/panti asuhan dan juga orang/kaum yang sangat memerlukan bantuan, BANTU program ini berfungsi sebagai pemberi informasi kepada donatur yang ingin memberikan bantuan kepada yayasan yang membutuhkan dan juga mewadahi semua aktifitas yang akan dilakukan. Dengan aplikasi ini donatur akan sangat mudah menemukan yayasan/panti mana saja yang sangat membutuhkan, sistem nya pun berjalan dengan 4 aktor dan 70 KF didalamnya yang semuanya bisa melakukan aktifitas dengan lancar maupun mobile dengan didukung jaringan internet. Tak hanya donatur yang sangat diberikan akses yayasan pun juga bisa mendaftarkan yayasan nya di aplikasi ini agar semua orang tahu bahwa yayasan yang telah terdaftar sedang memerlukan bantuan. Yayasan/panti yang telah diberikan akses kedalam sistem ini pun bisa membantu orang – orang yang membutuhkan untuk membuatkan akun dan wallet/dompet untuk nantinya bisa digunakan untuk menyimpan uang yang diterima dari donatur yang akan dikirimkan berbentuk kartu, dan kartu ini pun bisa digunakan untuk mengambil beras yang telah tersedia di ATM beras yang sudah di sebar luaskan di daerahnya. BANTU pun bekerja sama dengan GRAB/GOJEK sebagai sarana transportasi pengantar makanan atau barang yang akan dikirimkan oleh donatur dengan sistem yang sama seperti mengirim barang di aplikasi tersebut. BANTU juga terhubung dengan integrase ATM beras yang ada, jadi nanti ATM beras akan di isi oleh petugas dari donasi yang dikirim oleh donatur. Sebagai social enterprise startup,BANTU mengenakan biaya administrasi sebesar 5% dari total donasi di sebuah penggalangan, kecuali penggalangan bencana alam dan zakat (0% biaya administrasi). Dengan model ini, kami bisa fokus mengembangkan teknologi dan layanan untuk terus mempermudah kegiatan menggalang dana dan donasi di Indonesia dan dunia
      </div>
    </div>
  </div>


@endsection
