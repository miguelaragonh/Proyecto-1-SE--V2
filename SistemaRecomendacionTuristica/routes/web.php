<?php

use App\Http\Controllers\EstadosController;
use App\Http\Controllers\LoginController;
use App\Models\Rol;
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
Route::post('/register/crear', [LoginController::class, 'register'])->name('crearUsuario');
Route::post('/register/crearAdmin', [LoginController::class, 'registerAdmin'])->name('crearAdmin');
Route::post('/iniciar', [LoginController::class, 'login'])->name('iniciarSesion');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/home', function () {return view('welcome');})->name('welcome');
    Route::get('/error', function () {return view('error');})->name('error');

    //Estados
    Route::get('/estados',[EstadosController::class,'index'])->name('estados');
    Route::post('/estados/crear',[EstadosController::class,'store'])->name('crearEstado');
    Route::post('/estados/editar/{id}',[EstadosController::class,'update'])->name('editarEstado');
    Route::delete('/estados/eliminar/{estado}',[EstadosController::class,'destroy'])->name('eliminarEstado');
});


Route::middleware(['auth', 'role'])->group(function () {
    //Estados
    Route::get('/estados',[EstadosController::class,'index'])->name('estados');
    Route::post('/estados/crear',[EstadosController::class,'store'])->name('crearEstado');
    Route::post('/estados/editar/{id}',[EstadosController::class,'update'])->name('editarEstado');
    Route::delete('/estados/eliminar/{estado}',[EstadosController::class,'destroy'])->name('eliminarEstado');
});
