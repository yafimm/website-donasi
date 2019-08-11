@extends('layouts.dashboard')

@section('content')

    <div class="container py-3">
      <div class="col-md-12 py-2">
        @include('_partial.flash_message')
        <h2> Sumbangan Index </h2>
        @if(Auth::user()->isAdmin())
        <a href="{{ route('sumbangan.create') }}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add Data</a>
        <a href="{{ route('sumbangan.index') }}" class="btn btn-primary"><i class="fa fa-home" aria-hidden="true"></i> Index Sumbangan</a>
        <a href="{{ route('sumbangan.history') }}" class="btn btn-info"><i class="fa fa-history" aria-hidden="true"></i> History Sumbangan</a>
        @else
        <a href="{{ route('sumbangan.index.user') }}" class="btn btn-primary"><i class="fa fa-home" aria-hidden="true"></i> Index Sumbangan</a>
        <a href="{{ route('sumbangan.history.user') }}" class="btn btn-info"><i class="fa fa-history" aria-hidden="true"></i> History Sumbangan</a>
        @endif
      </div>
      <div class="col-md-12">
        <table class="table table-sm table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ID</th>
              <th scope="col">Pengirim</th>
              <th scope="col">Penerima</th>
              <th scope="col">Waktu</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($sumbangan as $key => $row)
            <tr>
              <th scope="row">{{$key + 1}}</th>
              <th scope="row">{{$row->id}}</th>
              <td>{{$row->pengirim->username}}</td>
              <td scope="row">{{ ($row->penerima) ? $row->penerima->username : '-' }}</td>
              <td>{{$row->created_at->format('H.i d M Y')}}</td>
              <td>{{$row->status}}</td>
              <td>
                @if(Auth::user()->isYayasan() || Auth::user()->isDonatur())
                  <a href="{{ route('sumbangan.edit', $row->id) }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                @endif
                <a href="{{ route('sumbangan.show.user', $row->id) }}" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i></a>
                <a href="{{ route('sumbangan.destroy', $row->id) }}" class="btn btn-danger"  onclick="event.preventDefault();
                document.getElementById('sumbangan-delete-{{ $row->id }}').submit();"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                <form class="" id="sumbangan-delete-{{ $row->id }}" action="{{ route('sumbangan.destroy', $row->id) }}" method="post">
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
