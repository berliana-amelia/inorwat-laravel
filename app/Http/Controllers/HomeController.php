<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $response = Http::withToken('746eb902819ff958739cc01599dba0b32b9172ae27e96d3b7684994770020781')
            ->get('https://server-inorwat-main.kq6wtm.easypanel.host/sensor');

        // Decode the JSON response
        $data = $response->json();
        $name = Session::get('user.name');
        return view('dashboard', compact('name', 'data'));
    }
}
