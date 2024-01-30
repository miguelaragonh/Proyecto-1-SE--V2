<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estados = Estado::all();
        $roles = Rol::with('estado')->get();
        return view('admin.roles', compact('estados','roles'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rol = new Rol();
        $rol->nombre = $request->nombre;
        $rol->descripcion = $request->descripcion;
        $rol->idEstado = $request->idEstado;
        $rol->save();
        return redirect()->route('rol')->with('message', 'Rol se agrego correctamente..');
    }




    public function update(Request $request, string $id)
    {
        $rol = Rol::find($id);
        $rol->nombre = $request->nombre;
        $rol->descripcion = $request->descripcion;
        $rol->idEstado = $request->idEstado;
        $rol->save();
        return redirect()->route('rol')->with('message', 'Rol ' . $rol->nombre . ' actualizado correctamente correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rol $rol)
    {
        $rol->delete();
        return redirect()->route('rol')->with('message', 'Rol se elimino correctamente..');
    }
}
