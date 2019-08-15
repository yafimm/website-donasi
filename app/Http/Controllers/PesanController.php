<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesan;
use App\detailPesan;

class PesanController extends Controller
{

    public function index()
    {
        $pesan = Pesan::where([['status', '=', 'Belum Selesai'], ['id_user','=', \Auth::user()->id]])->simplePaginate(15);
        return view('pesan.index-user', compact('pesan'));
    }

    public function index_history()
    {
        $pesan = Pesan::where([['status', '=', 'Selesai'], ['id_user','=', \Auth::user()->id]])->simplePaginate(15);
        return view('pesan.index-user', compact('pesan'));
    }

    public function index_admin()
    {
        $pesan = Pesan::where('status', '=', 'Belum Selesai')->simplePaginate(15);
        return view('pesan.index-user', compact('pesan'));
    }

    public function index_admin_history()
    {
        $pesan = Pesan::where('status', '=', 'Selesai')->simplePaginate(15);
        return view('pesan.index-user', compact('pesan'));
    }


    public function create()
    {
        $pesan = new Pesan;
        return view('pesan.create', compact('pesan'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['id_user'] = \Auth::user()->id;
        $input['status'] = 'Belum Selesai';
        $pesan = Pesan::create($input);
        if($pesan){
              $detailPesan = detailPesan::create(['id_user' => \Auth::user()->id,
                                                'isi_pesan' => $input['pesan'],
                                                'id_pesan' => $pesan->id ]);
              if($detailPesan){
                  return redirect()->route('pesan.index-user');
              }
        }
        return redirect()->route('pesan.create');
    }

    public function show(Pesan $pesan)
    {
        $all_pesan = detailPesan::where('id_pesan', '=', $pesan->id)->get();
        if($pesan->id_user == \Auth::user()->id || \Auth::user()->isAdmin() || \Auth::user()->isHelpdesk()){
            return view('pesan.show', compact('pesan', 'all_pesan'));
        }
        return redirect('google.com');
    }

    public function edit($id)
    {
        //
    }

    //fungsi buat kirim pesan
    public function update(Request $request, Pesan $pesan)
    {
        if($pesan->status == 'Belum Selesai'){
            if($pesan->id_user == \Auth::user()->id || \Auth::user()->isAdmin()){
                $input = $request->all();
                $input['id_user'] = \Auth::user()->id;
                $input['id_pesan'] = $pesan->id;
                $store = detailPesan::create($input);
                if($store){
                    return redirect()->back();
                }
            }
        }
        return abort(404);
    }

    public function update_status($id)
    {
        $pesan = Pesan::find($id);
        if($pesan){
            if(\Auth::user()->isAdmin() || \Auth::user()->isHelpdesk()){
                $pesan->update(['status' => 'Selesai']);
                return redirect()->route('pesan.index-admin')
                                ->with('alert-class', 'alert-success')
                                ->with('Pesan Bantuan telah diselesaikan');
            }
        }
        return abort(404);
    }

    public function destroy($id)
    {
        //
    }
}
