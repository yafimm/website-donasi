<div class="form-group">
   <label for="exampleFormControlInput1">Nama</label>
   <input type="text" class="form-control" name="nama" placeholder="Masukkan nama" value="{{ old('nama', $pegawai->nama)}}">
   @if($errors->has('nama'))
    <small class="form-text text-danger">*{{ $errors->first('nama') }}</small>
    @endif
 </div>
 <div class="form-group">
    <label for="exampleFormControlInput1">Email</label>
    <input type="email" class="form-control" name="email" placeholder="Masukkan email" value="{{ old('email', $pegawai->email)}}">
    @if($errors->has('email'))
     <small class="form-text text-danger">*{{ $errors->first('email') }}</small>
     @endif
  </div>
  <div class="form-group">
     <label for="exampleFormControlInput1">Username</label>
     <input type="text" class="form-control" name="username" placeholder="Masukkan username" value="{{ old('username', $pegawai->username)}}">
     @if($errors->has('username'))
      <small class="form-text text-danger">*{{ $errors->first('username') }}</small>
      @endif
   </div>
 <div class="form-group">
   <label for="exampleFormControlSelect1">Gender</label>
   <select class="form-control" name="gender">
      <option value="Pria">Pria</option>
      <option value="Wanita">Wanita</option>
   </select>
   @if($errors->has('gender'))
    <small class="form-text text-danger">*{{ $errors->first('gender') }}</small>
    @endif
 </div>

 <button type="submit" class="btn btn-success" name="button">Submit</button>
