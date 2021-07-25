<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //membuat function setiap halaman yang ingin ditampilkan
    public function index(){     
        return view('Dashboard.index');//menampilkan halaman index
    }
}
