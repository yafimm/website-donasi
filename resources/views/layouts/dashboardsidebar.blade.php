<div class="bg-light border-right" id="sidebar-wrapper">
  <div class="sidebar-heading">BANTU </div>
  <div class="list-group list-group-flush">
    @if(Auth::user()->isAdmin())
      <a href="{{ route('dashboard.admin') }}" class="list-group-item list-group-item-action bg-light">Dashboard</a>
      <a href="{{ route('pegawai.index')}}" class="list-group-item list-group-item-action bg-light">Kelola Pegawai</a>
      <a href="{{ route('zakat.index') }}" class="list-group-item list-group-item-action bg-light">Kelola Zakat</a>
      <a href="{{ route('sumbangan.index') }}" class="list-group-item list-group-item-action bg-light">Kelola Sumbangan</a>
    @else
      <a href="{{ url('dashboard') }}" class="list-group-item list-group-item-action bg-light">Dashboard</a>
      <a href="{{ route('zakat.index.user') }}" class="list-group-item list-group-item-action bg-light">Zakat</a>
      <a href="{{ route('sumbangan.index.user')}}" class="list-group-item list-group-item-action bg-light">Sumbangan</a>
    @endif
    <a href="#" class="list-group-item list-group-item-action bg-light">Bantuan dan Keluhan</a>
  </div>
</div>
