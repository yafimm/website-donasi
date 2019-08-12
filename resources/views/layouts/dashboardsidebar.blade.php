<div class="bg-light border-right" id="sidebar-wrapper">
  <div class="sidebar-heading">
      <img src="https://seeklogo.com/images/B/b-logo-A317956935-seeklogo.com.png" width="30" height="30" class="d-inline-block align-top" alt="">
      BANTU
  </div>
  <div class="list-group list-group-flush">
    <a href="{{ url('/') }}" class="list-group-item list-group-item-action bg-light">Go to Website</a>
    @if(Auth::user()->isAdmin() || Auth::user()->isHelpdesk())
      <a href="{{ route('dashboard.admin') }}" class="list-group-item list-group-item-action bg-light">Dashboard</a>
      <a href="{{ route('zakat.index') }}" class="list-group-item list-group-item-action bg-light">Kelola Zakat</a>
      <a href="{{ route('sumbangan.index') }}" class="list-group-item list-group-item-action bg-light">Kelola Sumbangan</a>
      @if(Auth::user()->isAdmin())
      <a href="{{ route('pegawai.index')}}" class="list-group-item list-group-item-action bg-light">Kelola Pegawai</a>
      <a href="{{ route('donatur.index')}}" class="list-group-item list-group-item-action bg-light">Data Donatur</a>
      <a href="{{ route('yayasan.index')}}" class="list-group-item list-group-item-action bg-light">Data Yayasan</a>
      @endif
    @else
      <a href="{{ url('dashboard') }}" class="list-group-item list-group-item-action bg-light">Dashboard</a>
      <a href="{{ route('zakat.index.user') }}" class="list-group-item list-group-item-action bg-light">Zakat</a>
      <a href="{{ route('sumbangan.index.user')}}" class="list-group-item list-group-item-action bg-light">Sumbangan</a>
    @endif
    <a href="#" class="list-group-item list-group-item-action bg-light">Bantuan dan Keluhan</a>
  </div>
</div>
