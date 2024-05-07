<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function admin()
    {
        return view('admin.dashboard');
    }
    public function vendor()
    {
        return view('vendor.dashboard');
    }
}
