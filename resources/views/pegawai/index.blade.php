@extends('layouts.dashboard')

@section('content')

    <div class="container py-3">

      @include('_partial.flash_message')

      <div class="col-md-12 py-2">
        <h2> Pegawai Index </h2>
        <a href="{{ route('pegawai.create') }}" class="btn btn-primary">Add Pegawai</a>
      </div>
      <div class="col-md-12">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ID</th>
              <th scope="col">Username</th>
              <th scope="col">Nama</th>
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
              <td>
                <a href="{{ route('pegawai.edit', $row->id) }}" class="item"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <form class="" action="{{ route('pegawai.destroy', $row->id) }}" method="post">
                    @method('DELETE')
                    @CSRF
                    <button class="item" type="submit">
                      <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                </form>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
@endsection
