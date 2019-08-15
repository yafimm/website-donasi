@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
        <div class="col-md-12 col-12">
          <div class="jumbotron">
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <form action="{{ route('pesan.index') }}" method="POST">
              @method('POST')
              @CSRF
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" name="title" class="form-control" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Pesan</label>
                <div class="col-sm-10">
                  <textarea name="pesan" class="form-control" rows="8" cols="80"></textarea>
                </div>
              </div>
              <p class="lead">
                <button class="btn btn-primary btn-lg" href="#" type="submit">Buat Tiket bantuan</button>
              </p>
            </form>
          </div>
        </div>
      </div>
  </div>

@endsection
