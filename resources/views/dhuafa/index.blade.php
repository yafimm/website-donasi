@extends('layouts.dashboard')

@section('content')

    <div class="container py-3">
      <div class="col-md-12 py-2">
        @include('_partial.flash_message')
        <h2> Dhuafa Index </h2>
        <a href="{{ route('dhuafa.create') }}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add Dhuafa</a>
      </div>
      <div class="col-md-12">
        <table class="table table-sm table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ID</th>
              <th scope="col">Nama</th>
              <th scope="col">No Telpon</th>
              <th scope="col">Gender</th>
              <th scope="col">Alamat</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($dhuafa as $key => $row)
            <tr>
              <th scope="row">{{$key + 1}}</th>
              <th scope="row">{{$row->id}}</th>
              <td>{{$row->nama}}</td>
              <td scope="row">{{ $row->no_telp }}</td>
              <td>{{ $row->gender }}</td>
              <td>{{ $row->alamat }}</td>
              <td>
                <a href="{{ route('dhuafa.show', $row->id) }}" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i></a>
                <a href="{{ route('dhuafa.destroy', $row->id) }}" class="btn btn-danger"  onclick="event.preventDefault();
                document.getElementById('dhuafa-delete-{{ $row->id }}').submit();"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                <form class="" id="dhuafa-delete-{{ $row->id }}" action="{{ route('dhuafa.destroy', $row->id) }}" method="post">
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
      {{ $dhuafa->links() }}
    </div>
@endsection
