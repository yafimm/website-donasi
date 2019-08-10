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
        return view('home');
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
