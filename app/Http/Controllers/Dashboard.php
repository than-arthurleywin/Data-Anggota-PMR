<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function show()
    {

        // Return dashboard dengan halaman yang sesuai
        return view('auth.dashboard');
    }
}
