<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LugaresController;
use App\Http\Controllers\RolesController;
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
    Route::get('/profile', function () {return view('profile');})->name('profile');
    Route::get('/favorites', function () {return view('favorites');})->name('favorites');
    Route::get('/error', function () {return view('error');})->name('error');


});


Route::middleware(['auth', 'role'])->group(function () {
    //Estados
    Route::get('/estados',[EstadosController::class,'index'])->name('estados');
    Route::post('/estados/crear',[EstadosController::class,'store'])->name('crearEstado');
    Route::post('/estados/editar/{id}',[EstadosController::class,'update'])->name('editarEstado');
    Route::delete('/estados/eliminar/{estado}',[EstadosController::class,'destroy'])->name('eliminarEstado');

    //Roles
    Route::get('/rol',[RolesController::class,'index'])->name('rol');
    Route::post('/rol/crear',[RolesController::class,'store'])->name('crearRol');
    Route::post('/rol/editar/{id}',[RolesController::class,'update'])->name('editarRol');
    Route::delete('/rol/eliminar/{rol}',[RolesController::class,'destroy'])->name('eliminarRol');

    //Categorias
    Route::get('/categoria',[CategoriasController::class,'index'])->name('categoria');
    Route::post('/categoria/crear',[CategoriasController::class,'store'])->name('crearCategoria');
    Route::post('/categoria/editar/{id}',[CategoriasController::class,'update'])->name('editarCategoria');
    Route::delete('/categoria/eliminar/{categoria}',[CategoriasController::class,'destroy'])->name('eliminarCategoria');

    //Lugaress
    Route::get('/lugar',[LugaresController::class,'index'])->name('lugar');
    Route::post('/lugar/crear',[LugaresController::class,'store'])->name('crearLugar');
    Route::post('/lugar/editar/{id}',[LugaresController::class,'update'])->name('editarLugar');
    Route::delete('/lugar/eliminar/{lugar}',[LugaresController::class,'destroy'])->name('eliminarLugar');
});
