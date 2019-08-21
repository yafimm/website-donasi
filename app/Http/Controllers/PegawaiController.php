<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use PDF;

class PegawaiController extends Controller
{
  public function index()
  {
      $all_pegawai = User::where('id_role', '=','3')->simplePaginate(20);
      return view('pegawai.index', compact('all_pegawai'));
  }

  public function create()
  {
      $pegawai = new User;
      return view('pegawai.create', compact('pegawai'));
  }

  public function store(Request $request)
  {
      $input = $request->all();
      $input['password'] = bcrypt($request->username);
      $input['id_role'] = 3; // Helpdesk
      $store = User::create($input);
      if($store){
          return redirect()->route('pegawai.index')->with('alert-class','alert-success')
                          ->with('flash_message','Pegawai berhasil diregistrasi');
      }
      //Kalo fail dilempar kesini
      return redirect()->route('pegawai.index')->with('alert-class','alert-danger')
                      ->with('flash_message','Pegawai gagal diregistrasi');
  }

  public function show(User $pegawai)
  {
      if($pegawai->id_role == 3){ // kalo user bukan pegawai, pake ini soalnya laravel model binding
          return view('pegawai.show', compact('pegawai'));
      }
      return abort(404);
  }

  public function edit(User $pegawai)
  {
      if($pegawai->id_role == 3){ // kalo user bukan pegawai, pake ini soalnya laravel model binding
          return view('pegawai.edit', compact('pegawai'));
      }
      return abort(404);
  }

  public function update(Request $request, User $pegawai)
  {
      $input = $request->all();
      $update = $pegawai->update($input);
      if($update){
          return redirect()->route('pegawai.index')->with('alert-class','alert-success')
                          ->with('flash_message','Data berhasil diupdate');
      }
      //Kalo fail dilempar kesini
      return redirect()->route('pegawai.index')->with('alert-class','alert-danger')
                      ->with('flash_message','Data gagal diupdate');
  }

  public function destroy(User $pegawai)
  {
      $delete = $pegawai->delete();
      if($delete){
          return redirect()->route('pegawai.index')->with('alert-class','alert-success')
                          ->with('flash_message','Data berhasil dihapus');
      }
      //Kalo fail dilempar kesini
      return redirect()->route('pegawai.index')->with('alert-class','alert-danger')
                      ->with('flash_message','Data gagal dihapus');
  }

  public function cetak_pdf()
  {
      $all_pegawai = User::where('id_role', '=','3')->get();
      $pdf = PDF::loadview('pegawai.download-pdf', ['all_pegawai' => $all_pegawai]);
      return $pdf->download();
  }

}
