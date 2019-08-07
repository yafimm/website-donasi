<!-- <div class="form-group">
   <label for="exampleFormControlInput1">Penerima</label>
   <input type="text" class="form-control" name="Penerima" placeholder="Masukkan username penerima (Yayasan)" value="">
   @if($errors->has('judul'))
    <small class="form-text text-danger">*{{ $errors->first('judul') }}</small>
    @endif
 </div> -->
 <div class="form-group">
   <label for="exampleFormControlSelect1">Jenis Zakat</label>
   <select class="form-control" name="jenis_zakat">
     @foreach($jenis_zakat as $jenis)
      <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
     @endforeach
   </select>
 </div>
 <div class="form-group">
   <label for="exampleFormControlSelect2">Gambar</label>
   <input type="file" name="" value="">
 </div>
 <div class="form-group">
   <label for="exampleFormControlSelect2">Bukti pengiriman</label>
   <input type="file" name="" value="">
 </div>
 <div class="form-group">
   <label for="exampleFormControlTextarea1">Deskripsi</label>
   <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
 </div>

 <button type="submit" class="btn btn-success" name="button">Submit</button>
