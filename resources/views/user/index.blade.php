@extends('layouts.dashboard')

@section('content')

    <div class="container py-3">
      <div class="col-md-12 py-2">
        <h2> Data User </h2>

      </div>
      <div class="col-md-12">
        <table class="table table-sm table-hover table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ID</th>
              <th scope="col">Username</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">Tanggal Join</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $key => $row)
            <tr>
              <th scope="row">{{$key + 1}}</th>
              <th scope="row">{{$row->id}}</th>
              <td>{{$row->username}}</td>
              <td>{{$row->nama}}</td>
              <td>{{$row->email}}</td>
              <td>{{$row->created_at->format('d M Y')}}</td>
              <td>
                  @if(Request::segment(2) == 'donatur' )
                  <a href="{{ route('donatur.show', $row->username) }}" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i></a>
                  @else
                  <a href="{{ route('yayasan.show', $row->username) }}" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i></a>
                  @endif
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
@endsection
