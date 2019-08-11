 <div class="form-group">
   <label for="exampleFormControlSelect1">Jenis Zakat</label>
   <select class="form-control" name="id_jenis_donasi">
     @foreach($jenis_zakat as $jenis)
      <option value="{{ $jenis->id }}" {{ ($jenis->id == $zakat->id_jenis_donasi) ? 'selected' : ''}}>{{ $jenis->nama }}</option>
     @endforeach
   </select>
 </div>
 <div class="form-group">
   <label for="exampleFormControlSelect2">Gambar</label>
   <input type="file" id="gambarInp" name="gambar" value="" class="form-control-file">
   <img id="gambar" src="{{ asset('images/donasi/'.$zakat->gambar) }}" class="img-fluid"/>
   <small class="form-text text-info">*Upload gambar barang/uang yang akan dizakatkan</small>
 </div>
 <div class="form-group">
   <label for="exampleFormControlSelect2">Bukti pengiriman</label>
   <input type="file" id="bukti_pengiriman" name="bukti_pengiriman" value="" class="form-control-file">
   <img id="bukti_pengiriman" src="{{ asset('images/bukti/'.$zakat->bukti_pengiriman) }}" class="img-fluid"/>
   <small class="form-text text-info">*Upload gambar barang bukti pengiriman kepada pihak kami</small>
 </div>
 <div class="form-group">
   <label for="exampleFormControlTextarea1">Deskripsi</label>
   <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3">{{ $zakat->deskripsi }}</textarea>
   <small class="form-text text-info">*Deskripsikan barang atau uang yang akan dizakatkan sesuai gambar zakat yang dikirimkan</small>
 </div>

 <button type="submit" class="btn btn-block btn-success" name="button">Submit</button>
