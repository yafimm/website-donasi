@extends('layouts.dashboard')

@section('content')
<div class="col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12 py-3">
  @include('_partial.flash_message')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4>Account</h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('account.update') }}" enctype="multipart/form-data">
                          @CSRF
                          @method('post')
                          <div class="form-group row">
                            <label for="username" class="col-4 col-form-label">Foto Profil</label>
                            <div class="col-8">
                              <input id="foto" name="foto" class="form-control-file" type="file">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="username" class="col-4 col-form-label">Username</label>
                            <div class="col-8">
                              <input id="username" value="{{ $user->username }}" class="form-control here" required="required" type="text" disabled>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="nama" class="col-4 col-form-label">Nama</label>
                            <div class="col-8">
                              <input id="nama" name="nama" placeholder="Nama" value="{{ $user->nama }}" class="form-control here" type="text">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="email" class="col-4 col-form-label">Email</label>
                            <div class="col-8">
                              <input name="email" value="{{ $user->email }}" placeholder="Email" class="form-control here" type="email">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="gender" class="col-4 col-form-label">Gender</label>
                            <div class="col-8">
                              <select id="gender" name="gender" class="form-control here" required="required">
                                  <option value="Pria" {{ ($user->gender == 'Pria' ? 'selected' : '') }}>Pria</option>
                                  <option value="Wanita" {{ ($user->gender == 'Wanita' ? 'selected' : '') }} >Wanita</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="select" class="col-4 col-form-label">No Telpon</label>
                            <div class="col-8">
                              <input name="no_telp" value="{{ $user->no_telp }}" placeholder="No Telpon" class="form-control here" type="text">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="no_rekening" class="col-4 col-form-label">No Rekening</label>
                            <div class="col-8">
                              <input id="no_rekening" value="{{ $user->no_rekening }}" name="no_rekening" placeholder="No Rekening" class="form-control here" type="text">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="publicinfo" class="col-4 col-form-label">Public Info</label>
                            <div class="col-8">
                              <textarea id="publicinfo" name="deskripsi" cols="40" rows="4" class="form-control">{{ $user->deskripsi }}</textarea>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-4 col-8">
                              <button name="submit" type="submit" class="btn btn-primary">Update My Profile</button>
                            </div>
                          </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
  </div>

  <div class="col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12">
      <div class="card">
          <div class="card-body">
              <div class="row">
                  <div class="col-md-12">
                      <h4>Password</h4>
                      <hr>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <form method="POST" action="{{ route('account.password.update') }}" enctype="multipart/form-data">
                            @CSRF
                            @method('PUT')
                            <div class="form-group row">
                              <label for="old_password" class="col-4 col-form-label">Password Lama</label>
                              <div class="col-8">
                                <input id="old_password" name="old_password" class="form-control" type="password">
                                @if($errors->has('old_password'))
                                  <small class="form-text text-danger">*{{ $errors->first('old_password') }}</small>
                                @endif</div>
                            </div>
                            <div class="form-group row">
                              <label for="username" class="col-4 col-form-label">Password Baru</label>
                              <div class="col-8">
                                <input id="new_password" name="new_password" class="form-control" type="password">
                                @if($errors->has('new_password'))
                                  <small class="form-text text-danger">*{{ $errors->first('password') }}</small>
                                @endif</div>
                            </div>
                            <div class="form-group row">
                              <label for="nama" class="col-4 col-form-label">Konfirmasi Password Baru</label>
                              <div class="col-8">
                                <input id="new_password_confirmation" name="new_password_confirmation" class="form-control" type="password">
                                @if($errors->has('new_password_confirmation'))
                                  <small class="form-text text-danger">*{{ $errors->first('new_password_confirmation') }}</small>
                                @endif
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="offset-4 col-8">
                                <button name="submit" type="submit" class="btn btn-primary">Update Password</button>
                              </div>
                            </div>
                          </form>
                  </div>
              </div>
          </div>
      </div>
    </div>
@endsection
