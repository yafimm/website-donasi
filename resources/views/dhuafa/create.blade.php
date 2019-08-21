@extends('layouts.dashboard')

@section('content')

    <div class="container py-3">
      <div class="col-12">
        <h2>Add Data Dhuafa</h2>
      </div>
      <div class="col-md-12 py-2">
        <form class="" method="POST" action="{{ route('dhuafa.store') }}" enctype="multipart/form-data">
          @csrf
          @method('POST')
          <div class="form-group">
            <label for="exampleFormControlSelect2">Nama</label>
            <input type="text" id="gambarInp" name="nama" value="" class="form-control">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect2">No Telpon</label>
            <input type="text" id="buktiInp" name="no_telp" value="" class="form-control">
          </div>
          <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">Gender</label>

              <div class="col-md-6">
                      <div class="col-md-6">
                        <label for="text-input" class="form-check-label  cstm_checkbox-text">
                          <input type="radio" id="text-input" name="gender" value="Pria" class="form-check-input"> Pria
                        </label>
                      </div>
                      <div class="col-md-6">
                        <label for="text-input" class="form-check-label  cstm_checkbox-text">
                          <input type="radio" id="text-input" name="gender" value="Wanita" class="form-check-input"> Wanita
                        </label>
                      </div>

                  @error('gender')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Alamat</label>
            <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>

          <button type="submit" class="btn btn-block btn-success" name="button">Submit</button>

        </form>
      </div>
    </div>

@endsection
