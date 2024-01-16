<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
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
        $usuario->idRol = 1;
        $usuario->save();
        Auth::login($usuario);
        return redirect()->route('welcome');
    }
    public function login(Request $request)
    {
        $datos = [
            'email' => $request->email,
            'password' => $request->password
        ];
       $remember = ($request->has('remember')) ? true : false;
        if (Auth::attempt($datos,$remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('welcome'));
        } else {
            return redirect()->route('login');
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
