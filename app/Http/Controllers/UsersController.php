<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function dashboard()
    {
        return view('users.dashboard');
    }

    public function admindashboard(){
        return view('admin.dashboard');
    }
}
