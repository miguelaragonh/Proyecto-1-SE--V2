<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {return view('login');})->name('login');
Route::get('/register', function () {return view('register');})->name('register');
Route::post('/register/crear', [LoginController::class, 'register'])->name('crearUsuario');
Route::post('/iniciar', [LoginController::class, 'login'])->name('iniciarSesion');
Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/home', function () {return view('welcome');})->name('welcome');
});
