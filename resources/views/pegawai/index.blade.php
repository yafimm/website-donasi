@extends('layouts.dashboard')

@section('content')

    <div class="container py-3">

      @include('_partial.flash_message')

      <div class="col-md-12 py-2">
        <h2> Pegawai Index </h2>
        <a href="{{ route('pegawai.create') }}" class="btn btn-primary">Add Pegawai</a>
        <a target="_blank" href="{{ route('pegawai.cetak-pdf') }}" class="btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i> Print Data</a>

      </div>
      <div class="col-md-12">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ID</th>
              <th scope="col">Username</th>
              <th scope="col">Nama</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($all_pegawai as $key => $row)
            <tr>
              <th scope="row">{{$key + 1}}</th>
              <th>{{$row->id}}</th>
              <td>{{$row->username}}</td>
              <td>{{$row->nama}}</td>
              <td>{{$row->created_at->format('d M Y') }}</td>
              <td>
                <a href="{{ route('pegawai.edit', $row->id) }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="{{ route('pegawai.destroy', $row->id) }}" class="btn btn-danger"  onclick="event.preventDefault();
                document.getElementById('pegawai-delete-{{ $row->id }}').submit();"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                <form class="" id="pegawai-delete-{{ $row->id }}" action="{{ route('pegawai.destroy', $row->id) }}" method="post">
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

    <div class="d-flex justify-content-center">
      {{ $all_pegawai->links() }}
    </div>
@endsection
