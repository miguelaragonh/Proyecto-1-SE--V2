<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Estado;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estados = Estado::all();
        $roles = Rol::all();
        $usuarios = User::with('estado', 'rol')->get();
        return view('admin.usuarios', compact('estados', 'roles', 'usuarios'));
    }


    public function profile()
    {
        $categorias = Categoria::all();
        return view('profile', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $usuario = new User();
            $usuario->name = $request->name;
            $usuario->lastname = $request->lastname;
            $usuario->email = $request->email;
            $usuario->password = Hash::make('SRTcr123456789');
            $usuario->idEstado =  $request->idEstado;
            if ($request->hasFile('img') && $request->file('img')->isValid()) {
                $usuario->img = $this->guardarImg($request);
            } else {
                $usuario->img = null;
            }

            $usuario->idRol = ($request->idRol) ? $request->idRol : 2;
            $usuario->save();
            return redirect()->back()->with('message', 'Usuario se agrego correctamente..');;
        } catch (\Illuminate\Database\QueryException $e) {

            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return redirect()->back()->with('error', 'El correo ingresado tiene usuario registrado');
            }
        }
    }

    public function guardarImg(Request $request)
    {
        if ($request->isMethod('POST')) {
            $file = $request->file('img');
            $filename = date('YmdHi') . $request->input('name');
            $file->storeAs('', $filename . '.' . $file->extension(), 'public');
            $ubicacionImg = 'storage/' . $filename . '.' . $file->extension();
            return $ubicacionImg;
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $usuario = User::find($id);
            $usuario->name = $request->name;
            $usuario->lastname = $request->lastname;
            $usuario->email = $request->email;
            $usuario->idEstado =  $request->idEstado;
            $usuario->idRol = ($request->idRol) ? $request->idRol : 2;
            $usuario->preferencia = ($request->preferencia != 0) ? $request->preferencia : null;

            if ($request->hasFile('img') && $request->file('img')->isValid()) {
                var_dump('fdfdse');
                $usuario->img = $this->guardarImg($request);
            } else {
                $usuario->img = $usuario->img;
            }
            $usuario->save();
            return redirect()->back()->with('message', 'Usuario '. $usuario->name.' actualizado correctamente..');
        } catch (\Illuminate\Database\QueryException $e) {

            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return redirect()->back()->with('error', 'El correo ingresado tiene usuario registrado');
            }
        }
    }


    public function resetPassword(Request $request, string $id)
    {

        $usuario = User::find($id);
        $usuario->update(
            ['password' => Hash::make('SRTcr123456789')],
        );
        return redirect()->back()->with('message', 'Contraseña de '.$usuario->name.' fue reseteada correctamente');;
    }

    public function changePassword(Request $request, string $id)
    {
        $usuario = User::find($id);
        $input = $request->all();

        if (Hash::check($input['contrasenaActual'], $usuario->password) && !Hash::check($input['contrasenaNueva'], $usuario->password)) {
            $usuario->password = Hash::make($input['contrasenaNueva']);
            $usuario->save();

            return redirect()->back()->with('message', 'Contraseña de '.$usuario->name.' fue cambiada correctamente');;

        } else {
            return redirect()->back()->with('error', 'Contraseña Actual erronea');;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario)
    {

        try {
            $usuario->delete();
            return redirect()->back()->with('message','Usuario se elimino correctamente..');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar, existen registros asociados' );
        }
    }
}
