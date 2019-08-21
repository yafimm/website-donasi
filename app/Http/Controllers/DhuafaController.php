<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dhuafa;

class DhuafaController extends Controller
{

    public function index()
    {
        $dhuafa = Dhuafa::where('id_user', '=' , \Auth::user()->id)->simplePaginate(20);
        return view('dhuafa.index', compact('dhuafa'));
    }

    public function create()
    {
        $dhuafa = new Dhuafa;
        return view('dhuafa.create', compact('dhuafa'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['id_user'] = \Auth::user()->id;
        $store = Dhuafa::create($data);
        if($store)
        {
            return redirect()->route('dhuafa.index')->with('alert-class', 'alert-success')
                              ->with('flash_message', 'Data Dhuafa berhasil diinput');
        }
        return redirect()->route('dhuafa.index')->with('alert-class', 'alert-danger')
                          ->with('flash_message', 'Data Dhuafa gagal diinput');
    }

    public function show($id)
    {
        $dhuafa = Dhuafa::where([['id_user', '=', \Auth::user()->id], ['id', '=', $id]])->first();
        return view('dhuafa.show', compact('dhuafa'));
    }

    public function edit($id)
    {
        return abort(404);
    }

    public function update(Request $request, $id)
    {
        return abort(404);
    }

    public function destroy($id)
    {
        $dhuafa = Dhuafa::where([['id_user', '=', \Auth::user()->id], ['id', '=', $id]])->first();
        $delete = $dhuafa->delete();
        if($delete){
              return redirect()->route('dhuafa.index')->with('alert-class', 'alert-success')
                            ->with('flash_message', 'Data Dhuafa berhasil dihapus');
        }
        return redirect()->route('dhuafa.index')->with('alert-class', 'alert-danger')
                      ->with('flash_message', 'Data Dhuafa gagal dihapus');

    }
}
