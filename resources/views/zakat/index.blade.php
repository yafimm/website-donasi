@extends('layouts.dashboard')

@section('content')

    <div class="container py-3">
      <div class="col-md-12 py-2">
        <h2> Zakat Index </h2>
        <a href="{{ route('zakat.create') }}" class="btn btn-primary">Add Data</a>
      </div>
      <div class="col-md-12">
        <table class="table table-striped">
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
                <a href="{{ route('zakat.edit', $row->id) }}" class="item"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <form class="" action="{{ route('zakat.destroy', $row->id) }}" method="post">
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
