<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class HomeController extends Controller
{
    public function index()
    {
        $response = Http::withToken('746eb902819ff958739cc01599dba0b32b9172ae27e96d3b7684994770020781')
            ->get('https://server-inorwat-main.kq6wtm.easypanel.host/sensor');

        // Decode the JSON response
        $data = $response->json();
        $name = Session::get('user.name');

        // Return JSON response for AJAX requests
        if (request()->ajax()) {
            return response()->json($data);
        }

        return view('dashboard', compact('name', 'data'));
    }
    public function fetchData()
    {
        $response = Http::withToken('746eb902819ff958739cc01599dba0b32b9172ae27e96d3b7684994770020781')
            ->get('https://server-inorwat-main.kq6wtm.easypanel.host/sensor');

        // Decode the JSON response
        $data = $response->json();

        return response()->json($data);
    }


    public function toogleSprayer(Request $request)
    {
        $motorValue = $request->input('sprayer');

        // Your server URL
        $url = 'https://server-inorwat-main.kq6wtm.easypanel.host/sensor';

        // Your API token
        $token = '746eb902819ff958739cc01599dba0b32b9172ae27e96d3b7684994770020781';

        // Set up the PUT request
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->put($url, [
            'sprayer' => $motorValue,
        ]);

        // Log the response
        Log::info('Sprayer API Response: ' . $response->body());

        // Check if the API response status code is 200
        if ($response->status() == 200) {
            // Redirect to the home page
            return response()->json($response->json());
        }

        // If the status code is not 200, return the API response as JSON
        return response()->json($response->json());
    }
    public function toggleMotor(Request $request)
    {
        $motorValue = $request->input('motor');

        // Your server URL
        $url = 'https://server-inorwat-main.kq6wtm.easypanel.host/sensor';

        // Your API token
        $token = '746eb902819ff958739cc01599dba0b32b9172ae27e96d3b7684994770020781';

        // Set up the PUT request
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->put($url, [
            'motor' => $motorValue,
        ]);

        // Log the response
        Log::info('Motor API Response: ' . $response->body());

        // Check if the API response status code is 200
        if ($response->status() == 200) {
            // Redirect to the home page
            return response()->json($response->json());
        }

        // If the status code is not 200, return the API response as JSON
        return response()->json($response->json());
    }
}
