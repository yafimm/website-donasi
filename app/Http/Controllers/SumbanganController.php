<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donasi;
use Storage;

class SumbanganController extends Controller
{
  public function index()
  {
      $sumbangan = Donasi::where('status','=','Belum Selesai')->whereIn('id_jenis_donasi', [1])->simplePaginate(20);
      return view('sumbangan.index', compact('sumbangan'));
  }

  public function index_user()
  {
      if(\Auth::user()->isYayasan()){
        $sumbangan = Donasi::where([['id_penerima', '=', \Auth::user()->id], ['status', '=','Belum Selesai'], ['id_jenis_donasi' , '=', 1]])
                            ->orderBy('created_at', 'desc')
                            ->simplePaginate(20);
      }else{
        $sumbangan = Donasi::where([['id_pengirim', '=', \Auth::user()->id], ['status', '=','Belum Selesai'], ['id_jenis_donasi' , '=', 1]])
                            ->orderBy('created_at', 'desc')
                            ->simplePaginate(20);
      }
      return view('sumbangan.index', compact('sumbangan'));
  }

  public function history()
  {
      $sumbangan = Donasi::where([['id_jenis_donasi', '=', 1], ['status', '=', 'Selesai']])->simplePaginate(20);
      return view('sumbangan.index', compact('sumbangan'));
  }

  public function history_user()
  {
      if(\Auth::user()->isYayasan()){
          $sumbangan = Donasi::where([['id_penerima', '=', \Auth::user()->id], ['status', '=','Selesai'], ['id_jenis_donasi' , '=', 1]])
                          ->orderBy('created_at', 'desc')
                          ->simplePaginate(20);
          return view('sumbangan.index', compact('sumbangan'));

      }else{
          $sumbangan = Donasi::where([['id_pengirim', '=', \Auth::user()->id], ['status', '=','Selesai'], ['id_jenis_donasi' , '=', 1]])
                          ->orderBy('created_at', 'desc')
                          ->simplePaginate(20);
          return view('sumbangan.index', compact('sumbangan'));
     }
  }

  public function create()
  {
      $sumbangan = new Donasi;
      return view('sumbangan.create', compact('sumbangan'));
  }

  public function create_user()
  {
      $sumbangan = new Donasi;
      return view('sumbangan.create_user', compact('sumbangan'));
  }

  public function store(Request $request)
  {
      $input = $request->all();
      $input['id_pengirim'] = \Auth::user()->id;
      $input['id_jenis_donasi'] = 1;
      if(isset($input['gambar']))
      {
          $input['gambar'] = $this->uploadGambar($request);
      }
      if(isset($input['bukti_pengiriman']))
      {
          $input['bukti_pengiriman'] = $this->uploadBukti($request);
      }
      $input['status'] = 'Belum Selesai';
      $store = Donasi::create($input);
      if($store){
          return back()->with('alert-class','alert-success')
                          ->with('flash_message','Anda berhasil menyumbang. Tunggu balasan dari pihak yayasan / penerima untuk konfirmasi status, cek statusnya di dashboard');
      }
      //Kalo fail dilempar kesini
      return back()->with('alert-class','alert-danger')
                      ->with('Data gagal diinput');
  }

  public function show(Donasi $sumbangan)
  {
      if($sumbangan->id_jenis_donasi == 1){
          if(\Auth::user()->isAdmin() || \Auth::user()->isHelpdesk() || $sumbangan->id_penerima == \Auth::user()->id || $sumbangan->id_pengirim == \Auth::user()->id){
              return view('sumbangan.show', compact('sumbangan'));
          }
      }
      return abort(404);
  }

  public function show_user($username)
  {
      $yayasan = \App\User::where([['username', '=', $username],['id_role', '=', 2]])->first();
      if($yayasan){
        return view('sumbangan.detail_user', compact('yayasan'));
      }
      return abort(404);
  }

  public function edit(Donasi $sumbangan)
  {
      return view('zakat.edit', compact('sumbangan'));
  }

  public function update(Request $request, Donasi $sumbangan)
  {
      $input = $request->all();
      $update = $zakat->update($input);
      if($update){
          return redirect()->with('alert-class','alert-success')
                          ->with('Data berhasil diupdate');
      }
      //Kalo fail dilempar kesini
      return redirect()->with('alert-class','alert-danger')
                      ->with('Data gagal diupdate');
  }


  public function update_status(Request $request)
  {
      $zakat = Donasi::find($request->id);
      $update = $zakat->update(['status' => 'Selesai']);
      if($update){
        return redirect()->route('sumbangan.index.user')->with('alert-class','alert-success')
                        ->with('flash_message', 'Status data berhasil diupdate');
      }
      return redirect()->route('sumbangan.index.user')->with('alert-class','alert-danger')
                      ->with('flash_message','Status data gagal diupdate');
  }

  public function destroy(Donasi $sumbangan)
  {
      $this->hapusBukti($sumbangan);
      $this->hapusGambar($sumbangan);
      $delete = $sumbangan->delete();
      if($delete){
          return back()->with('alert-class','alert-success')
                          ->with('flash_message','Data sumbangan berhasil dihapus');
      }
      //Kalo fail dilempar kesini
      return back()->with('alert-class','alert-danger')
                      ->with('flash_message','Data sumbangan gagal dihapus');
  }

  private function uploadGambar(Request $request)
  {
      $gambar = $request->file('gambar');
      $ext = $gambar->getClientOriginalExtension();
      if($request->file('gambar')->isValid()){
          $filename = date('Ymd').uniqid().$ext;
          $upload_path = 'images/donasi';
          $request->file('gambar')->move($upload_path, $filename);
          return $filename;
      }
      return false;
  }

  private function uploadBukti(Request $request)
  {
      $bukti_pengiriman = $request->file('bukti_pengiriman');
      $ext = $bukti_pengiriman->getClientOriginalExtension();
      if($request->file('bukti_pengiriman')->isValid()){
          $filename = date('Ymd').uniqid().$ext;
          $upload_path = 'images/bukti';
          $request->file('bukti_pengiriman')->move($upload_path, $filename);
          return $filename;
      }
      return false;
  }

  private function hapusGambar(Donasi $zakat)
  {
      $exist = Storage::disk('gambar')->exists($zakat->gambar);
      if(isset($zakat->gambar) && $exist){
          $delete = Storage::disk('gambar')->delete($zakat->gambar);
          return $delete; //Kalo delete gagal, bakal return false, kalo berhasil bakal return true
      }
  }

  private function hapusBukti(Donasi $zakat)
  {
      $exist = Storage::disk('bukti_pengiriman')->exists($zakat->gambar);
      if(isset($zakat->bukti_pengiriman) && $exist){
          $delete = Storage::disk('bukti_pengiriman')->delete($zakat->gambar);
          return $delete; //Kalo delete gagal, bakal return false, kalo berhasil bakal return true
      }
  }
}
