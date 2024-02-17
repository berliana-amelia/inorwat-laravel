<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('auth');
Route::get('home', [HomeController::class, 'index'])->middleware('auth.check')->name('home');
Route::get('get-data', [HomeController::class, 'fetchData'])->middleware('auth.check');
Route::put('startStatus', [HomeController::class, 'stopStart'])->middleware('auth.check');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/toggle-motor', [HomeController::class, 'toggleMotor'])->middleware('auth.check');
Route::post('/toggle-sprayer', [HomeController::class, 'toogleSprayer'])->middleware('auth.check');
