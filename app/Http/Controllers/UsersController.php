<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function admindashboard()
    {
        return view('admin.dashboard');
    }

    public function index_donatur()
    {
        $data = User::where('id_role','=','1')->simplePaginate(20);
        return view('user.index', compact('data'));
    }

    public function index_yayasan()
    {
        $data = User::where('id_role','=','2')->simplePaginate(20);
        return view('user.index', compact('data'));
    }

    public function show($username)
    {
        $user = User::where('username', '=', $username)->first();
        if($user->isYayasan() || $user->isDonatur()){
            return view('user.show', compact('user'));
        }
        return abort(404);
    }
}
