@extends('layouts.dashboard')

@section('content')

    <div class="container py-3">
      <div class="col-md-12 py-2">
        @include('_partial.flash_message')
        <h2> Zakat Index </h2>
        @if(Auth::user()->isAdmin() || Auth::user()->isHelpdesk())
        <a href="{{ route('zakat.create') }}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add Data</a>
        <a href="{{ route('zakat.index') }}" class="btn btn-primary"><i class="fa fa-home" aria-hidden="true"></i> Index Zakat</a>
        <a href="{{ route('zakat.history') }}" class="btn btn-info"><i class="fa fa-history" aria-hidden="true"></i> History Zakat</a>
        @else
        <a href="{{ route('zakat.index.user') }}" class="btn btn-primary"><i class="fa fa-home" aria-hidden="true"></i> Index Zakat</a>
        <a href="{{ route('zakat.history.user') }}" class="btn btn-info"><i class="fa fa-history" aria-hidden="true"></i> History Zakat</a>
        @endif
      </div>
      <div class="col-md-12">
        <table class="table table-sm table-hover table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ID</th>
              <th scope="col">Pengirim</th>
              <th scope="col">Zakat</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($zakat as $key => $row)
            <tr>
              <th scope="row">{{$key + 1}}</th>
              <th scope="row">{{$row->id}}</th>
              <td>{{$row->pengirim->username}}</td>
              <td>{{$row->jenis_donasi->nama}}</td>
              <td>{{$row->created_at->format('d M Y')}}</td>
              <td>{{$row->status}}</td>
              <td>
                <a href="{{ route('zakat.edit', $row->id) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a href="{{ route('zakat.show', $row->id) }}" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i></a>
                <a href="{{ route('zakat.destroy', $row->id) }}" class="btn btn-danger"  onclick="event.preventDefault();
                document.getElementById('zakat-delete-{{$row->id}}').submit();"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                <form class="" id="zakat-delete-{{$row->id}}" action="{{ route('zakat.destroy', $row->id) }}" method="post">
                    @method('DELETE')
                    @CSRF
                </form>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
@endsection
