<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function index()
    {
        if (Session::has('user')) {
            // User is considered authenticated based on session data
            return redirect('/home');
        } else {
            return view('login');
        }
    }
    public function logout()
    {
        // Clear user data from the session
        Session::forget('user');
        Session::forget('expiration_time');

        return redirect('/login')->with('success', 'Successfully logged out.');
    }

    public function login(Request $request)
    {
        // Retrieve email and password from the form
        $email = $request->input('email');
        $password = $request->input('password');

        // Set up cURL options
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://server-inorwat-main.kq6wtm.easypanel.host/auth/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode([
                'email' => $email,
                'password' => $password,
            ]),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . env('SECRET_KEY'),
            ),
        ));

        // Execute cURL request
        $response = curl_exec($curl);

        // Check for cURL errors
        if (curl_errno($curl)) {
            echo 'Curl error: ' . curl_error($curl);
        }

        // Close cURL session
        curl_close($curl);

        // Decode the JSON response
        $responseData = json_decode($response, true);

        // Check if the login was successful
        if ($responseData && array_key_exists('token', $responseData)) {
            // Save user data in session
            Session::put('user', [
                'name' => $responseData['user']['name'] ?? null,
                'email' => $responseData['user']['email'] ?? null,
            ]);
            // Set expiration time for the session (1 hour)
            $expirationTime = now()->addHour();
            Session::put('expiration_time', $expirationTime);

            return redirect()->route('home');
        } else {
            // Handle login failure
            return redirect()->back()->with('error', 'Invalid Email/Password');
            // You may also log the error or perform additional actions as needed
        }

        // return view('welcome');
    }
}
