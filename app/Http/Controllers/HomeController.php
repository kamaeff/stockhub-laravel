<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function Home()
    {
        $data = DB::table('Users')->select()->count();
        return view('home', ['data' => $data]);
    }
}
