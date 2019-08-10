<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $yayasan = \App\User::where('id_role','=', 2)-> inRandomOrder(6)->get();
        $recent_donatur = \App\Donasi::where('status','=','Selesai')
                                      ->orderBy('created_at', 'desc')
                                      ->take(10)->get();
        return view('welcome', compact('yayasan','recent_donatur'));
    }

    public function zakat(){
        return view('zakat');
    }

    public function sumbangan(){
        $yayasan = \App\User::where('id_role', '=', 2)->simplePaginate(15);
        return view('sumbangan', compact('yayasan'));
    }

    public function about(){
        return view('about');
    }
}
