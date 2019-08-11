<div class="form-group">
  <label for="exampleFormControlSelect2">Gambar</label>
  <input type="file" id="gambarInp" name="gambar" value="" class="form-control-file">
  <img id="gambar" src="#" class="img-fluid"/>
  <small class="form-text text-info">*Upload gambar barang/uang yang akan dizakatkan</small>
</div>
<div class="form-group">
  <label for="exampleFormControlSelect2">Bukti pengiriman</label>
  <input type="file" id="buktiInp" name="bukti_pengiriman" value="" class="form-control-file">
  <img id="bukti_pengiriman" src="#" class="img-fluid"/>
  <small class="form-text text-info">*Upload gambar barang bukti pengiriman kepada pihak kami</small>
</div>
<div class="form-group">
  <label for="exampleFormControlTextarea1">Deskripsi</label>
  <textarea class="form-control" name=deskripsi id="exampleFormControlTextarea1" rows="3"></textarea>
  <small class="form-text text-info">*Deskripsikan barang atau uang yang akan dizakatkan sesuai gambar zakat yang dikirimkan</small>
</div>
<input type="hidden" name="id_penerima" value="{{ $yayasan->id }}">

<button type="submit" class="btn btn-block btn-success" name="button">Submit</button>
