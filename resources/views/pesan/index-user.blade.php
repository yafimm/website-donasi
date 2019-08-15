@extends('layouts.app')

@section('content')

    <div class="container py-5">
      <div class="col-md-12 py-2">
        @include('_partial.flash_message')
        <h2> Bantuan dan Keluhan </h2>
        @if(Auth::user()->isAdmin() || Auth::user()->isHelpdesk())
        <a href="{{ route('pesan.index-admin') }}" class="btn btn-primary"><i class="fa fa-home" aria-hidden="true"></i> Bantuan dan Keluhan index</a>
        <a href="{{ route('pesan.history-admin') }}" class="btn btn-info"><i class="fa fa-history" aria-hidden="true"></i> History</a>
        @else
        <a href="{{ route('pesan.create') }}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Buat Bantuan dan Keluhan</a>
        <a href="{{ route('pesan.index') }}" class="btn btn-primary"><i class="fa fa-home" aria-hidden="true"></i> Bantuan dan Keluhan index</a>
        <a href="{{ route('pesan.history') }}" class="btn btn-info"><i class="fa fa-history" aria-hidden="true"></i> History</a>
        @endif
      </div>
      <div class="col-md-12">
        <table class="table table-sm table-hover table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ID</th>
              <th scope="col">USERNAME</th>
              <th scope="col">TITLE</th>
              <th scope="col">TANGGAL</th>
              <th scope="col">STATUS</th>
              <th scope="col">ACTION</th>
            </tr>
          </thead>
          <tbody>

            @foreach($pesan as $key => $row)
            <tr>
              <th scope="row">{{$key + 1}}</th>
              <th scope="row">{{$row->id}}</th>
              <td>{{$row->user->username}}</td>
              <td>{{$row->title}}</td>
              <td>{{$row->created_at->format('d M Y')}}</td>
              <td>{{$row->status}}</td>
              <td>
                <a href="{{ route('pesan.show', $row->id) }}" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i></a>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>

    <div class="d-flex justify-content-center">
      {{ $pesan->links() }}
    </div>

@endsection
