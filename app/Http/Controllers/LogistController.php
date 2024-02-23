<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogistController extends Controller
{
    public function show_logist()
    {
        $data = DB::table('orders')->select()->paginate();
        return view('admin.admin-logist', ['data' => $data]);
    }

    public function change_data()
    {
    }
}