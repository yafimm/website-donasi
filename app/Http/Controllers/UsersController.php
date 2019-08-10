<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
