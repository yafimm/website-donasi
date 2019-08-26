<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donasi;
use App\jenisDonasi;
use App\User;
use Storage;
use PDF;

class ZakatController extends Controller
{

    public function index(Request $request)
    {
        $zakat = Donasi::where('status', '=','Belum Selesai')->whereIn('id_jenis_donasi', [2, 3])->simplePaginate(20);
        return view('zakat.index', compact('zakat'));
    }

    public function index_user()
    {
        $zakat = Donasi::where([['id_pengirim', '=', \Auth::user()->id], ['status', '=','Belum Selesai']])
                        ->whereIn('id_jenis_donasi', [2, 3])
                        ->orderBy('created_at', 'desc')
                        ->simplePaginate(20);

        return view('zakat.index', compact('zakat'));
    }

    public function history()
    {
        $zakat = Donasi::where('status','=','Selesai')->whereIn('id_jenis_donasi', [2, 3])->simplePaginate(20);
        return view('zakat.index', compact('zakat'));
    }

    public function history_user()
    {
        $zakat = Donasi::where([['id_pengirim', '=', \Auth::user()->id], ['status', '=','Selesai']])
                        ->whereIn('id_jenis_donasi', [2,3])
                        ->orderBy('created_at', 'desc')
                        ->simplePaginate(20);
        return view('zakat.index', compact('zakat'));
    }


    public function create()
    {
        $zakat = new Donasi;
        $jenis_zakat = jenisDonasi::whereIn('id', [2, 3])
                                    ->get();
        return view('zakat.create', compact('jenis_zakat', 'zakat'));
    }

    public function create_user()
    {
        $zakat = new Donasi;
        $jenis_zakat = jenisDonasi::whereIn('id', [2, 3])
                                  ->get();
        return view('zakat.create_user', compact('jenis_zakat', 'zakat'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
		$input['id_pengirim'] = \Auth::user()->id;
		
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
        if($store && \Auth::user()->isAdmin()){
            return redirect()->route('zakat.index')->with('alert-class','alert-success')
                            ->with('flash_message', 'Data Zakat berhasil diinput');
        }else if($store && !\Auth::user()->isAdmin()){
          return back()->with('alert-class','alert-success')
                          ->with('flash_message', 'Data Zakat berhasil diinput');

        }
        //Kalo fail dilempar kesini
        return back()->with('alert-class','alert-danger')
                        ->with('flash_message','Data Zakat gagal diinput');
    }

    public function show(Donasi $zakat)
    {
        return view('zakat.show', compact('zakat'));
    }

    public function edit(Donasi $zakat)
    {
      $jenis_zakat = jenisDonasi::whereIn('id', [2, 3])
                                  ->get();
        return view('zakat.edit', compact('zakat', 'jenis_zakat'));
    }

    public function update(Request $request, Donasi $zakat)
    {
        $input = $request->all();
        $input['gambar'] = 'test';
        $input['bukti_pengiriman'] = 'test';
        $update = $zakat->update($input);
        if($update){
            return redirect()->route('zakat.index')->with('alert-class','alert-success')
                            ->with('flash_message', 'Data berhasil diupdate');
        }
        //Kalo fail dilempar kesini
        return redirect()->route('zakat.index')->with('alert-class','alert-danger')
                        ->with('flash_message','Data gagal diupdate');
    }

    public function update_status(Request $request)
    {
        $zakat = Donasi::find($request->id);
        $update = $zakat->update(['status' => 'Selesai',
                                  'id_penerima' => \Auth::user()->id]);
        if($update){
          return redirect()->route('zakat.index')->with('alert-class','alert-success')
                          ->with('flash_message', 'Status data berhasil diupdate');
        }
        return redirect()->route('zakat.index')->with('alert-class','alert-danger')
                        ->with('flash_message','Status data gagal diupdate');
    }

    public function destroy(Donasi $zakat)
    {
        $this->hapusGambar($zakat);
        $delete = $zakat->delete();
        if($delete){
            return redirect()->route('zakat.index')->with('alert-class','alert-success')
                            ->with('flash_message','Data berhasil dihapus');
        }
        //Kalo fail dilempar kesini
        return redirect()->route('zakat.index')->with('alert-class','alert-danger')
                        ->with('flash_message','Data gagal dihapus');
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

    public function cetak_pdf()
    {
        $zakat = Donasi::whereIn('id_jenis_donasi', [2, 3])->get();
        $pdf = PDF::loadview('zakat.download-pdf', ['zakat' => $zakat]);
        return $pdf->download();
    }

}
