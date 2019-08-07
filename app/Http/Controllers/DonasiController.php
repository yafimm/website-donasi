  <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index()
    {
        $donasi = Donasi::where('id_jenis_donasi', '=', '1')
                        ->simplePaginate(20);
        return view('donasi.index', compact('donasi'));
    }

    public function create()
    {
        $donasi = new Donasi;
        return view('donasi.create', compact('donasi'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['id_jenis_donasi'] = 1; //auto jenisnya donasi
        $store = Donasi::create($input);
        if($store){
            return redirect()->with('alert-class','alert-success')
                            ->with('Data berhasil diinput');
        }
        //Kalo fail dilempar kesini
        return redirect()->with('alert-class','alert-danger')
                        ->with('Data gagal diinput');
    }

    public function show(Donasi $donasi)
    {
        return view('donasi.show', compact('donasi'));
    }

    public function edit(Donasi $donasi)
    {
        return view('donasi.edit', compact('donasi'));
    }

    public function update(Request $request, Donasi $donasi)
    {
        $input = $request->all();
        $update = $donasi->update($input);
        if($update){
            return redirect()->with('alert-class','alert-success')
                            ->with('Data berhasil diupdate');
        }
        //Kalo fail dilempar kesini
        return redirect()->with('alert-class','alert-danger')
                        ->with('Data gagal diupdate');
    }

    public function destroy(Donasi $donasi)
    {
        $delete = $donasi->delete();
        if($delete){
            return redirect()->with('alert-class','alert-success')
                            ->with('Data berhasil dihapus');
        }
        //Kalo fail dilempar kesini
        return redirect()->with('alert-class','alert-danger')
                        ->with('Data gagal dihapus');
    }
}
