<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donasi;

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
      $input['gambar'] = 'test';
      $input['id_jenis_donasi'] = 1;
      $input['bukti_pengiriman'] = 'test';
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
      return view('zakat.show', compact('zakat'));
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

  public function update_status(Request $request, Donasi $sumbangan)
  {
      $status = 'Selesai';
      $update = $zakat->update($status);
      if($update){
          return back()->with('alert-class', 'alert-success')
                       ->with('flash_message', 'Data status zakat berhasil diubah');
      }
      return back()->with('alert-class', 'alert-danger')
                   ->with('flash_message', 'Data status zakat gagal diubah');
  }

  public function destroy(Donasi $sumbangan)
  {
      $delete = $sumbangan->delete();
      if($delete){
          return back()->with('alert-class','alert-success')
                          ->with('flash_message','Data sumbangan berhasil dihapus');
      }
      //Kalo fail dilempar kesini
      return back()->with('alert-class','alert-danger')
                      ->with('flash_message','Data sumbangan gagal dihapus');
  }
}
