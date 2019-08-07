<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donasi;
use App\jenisDonasi;

class ZakatController extends Controller
{

    public function index()
    {
        $zakat = Donasi::where('id_jenis_donasi', '=', '2')
                        ->where('id_jenis_donasi', '=', '3')
                        ->simplePaginate(20);
        return view('zakat.index', compact('zakat'));
    }

    public function create()
    {
        $zakat = new Donasi;
        $jenis_zakat = jenisDonasi::where('id', '=', '2')
                                    ->where('id', '=', '3');
        return view('zakat.create', compact('jenis_zakat', 'zakat'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['pengirim'] = \Auth('users')->user()->id;
        $store = Donasi::create($input);
        if($store){
            return redirect()->with('alert-class','alert-success')
                            ->with('Data berhasil diinput');
        }
        //Kalo fail dilempar kesini
        return redirect()->with('alert-class','alert-danger')
                        ->with('Data gagal diinput');
    }

    public function show(Donasi $zakat)
    {
        return view('zakat.show', compact('zakat'));
    }

    public function edit(Donasi $zakat)
    {
        return view('zakat.edit', compact('zakat'));
    }

    public function update(Request $request, Donasi $zakat)
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

    public function destroy(Donasi $zakat)
    {
        $delete = $zakat->delete();
        if($delete){
            return redirect()->with('alert-class','alert-success')
                            ->with('Data berhasil dihapus');
        }
        //Kalo fail dilempar kesini
        return redirect()->with('alert-class','alert-danger')
                        ->with('Data gagal dihapus');
    }
}
