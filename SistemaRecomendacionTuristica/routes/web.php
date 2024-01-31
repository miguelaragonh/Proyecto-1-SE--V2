<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsuarioController;
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
    Route::get('/home',[LugaresController::class,'lugares'])->name('welcome');
    Route::post('/home/buscar',[LugaresController::class,'buscarLugar'])->name('buscar');
    Route::get('/profile', [UsuarioController::class,'profile'])->name('profile');
    Route::put('/profile/cambiar/contrasena/{id}',[UsuarioController::class,'changePassword'])->name('cambioPass');
    Route::post('/profile/editar/{id}',[UsuarioController::class,'update'])->name('editarUsuario2');
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

    //Lugares
    Route::get('/lugar',[LugaresController::class,'index'])->name('lugar');
    Route::post('/lugar/crear',[LugaresController::class,'store'])->name('crearLugar');
    Route::post('/lugar/editar/{id}',[LugaresController::class,'update'])->name('editarLugar');
    Route::delete('/lugar/eliminar/{lugar}',[LugaresController::class,'destroy'])->name('eliminarLugar');

     //Usuarios
    Route::get('/error2', function () {return view('error2');})->name('error2');

     Route::get('/usuario',[UsuarioController::class,'index'])->name('usuario');
     Route::post('/usuario/crear',[UsuarioController::class,'store'])->name('nuevoUsuario');
     Route::post('/usuario/editar/{id}',[UsuarioController::class,'update'])->name('editarUsuario');
     Route::delete('/usuario/eliminar/{usuario}',[UsuarioController::class,'destroy'])->name('eliminarUsuario');
     Route::put('/usuario/resetear/contraseña/{id}',[UsuarioController::class,'resetPassword'])->name('resetPass');
});
