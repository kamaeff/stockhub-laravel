<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminConroller extends Controller
{
    public function admin()
    {
        return view('admin.admin-main');
    }
}