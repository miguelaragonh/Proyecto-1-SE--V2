<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Login;
use App\Http\Controllers\LugaresController;

class LoginController extends LugaresController
{
    /**
     * Show the form for creating a new resource.
     */
    public function register(Request $request)
    {
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->lastname = $request->lastname;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->idEstado = 1;
        $usuario->idRol = ($request->idRol) ? $request->idRol : 2;
        $usuario->save();
        Auth::login($usuario);
        return redirect()->route('welcome')->with('message', 'Bienvenido ' . auth()->user()->name . ' a Destinos CR');
    }

    public function login(Request $request)
    {
        $datos = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $remember = ($request->has('remember')) ? true : false;

        if (Auth::attempt($datos, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('welcome')->with('message', 'Bienvenido ' . auth()->user()->name . ' a Destinos CR');
        } else {
            return redirect()->route('login')->with('message', 'Datos Erroneos, verifiquelos e intente nuevamente');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
