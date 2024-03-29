<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

class EstadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estados = Estado::all();
        return view('admin.estados', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $estado = new Estado();
        $estado->nombre = $request->nombre;
        $estado->descripcion = $request->descripcion;
        $estado->save();
        return redirect()->route('estados')->with('message','Estado se agrego correctamente..');
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $estado = Estado::find($id);
        $estado->nombre = $request->nombre;
        $estado->descripcion = $request->descripcion;
        $estado->save();
        return redirect()->route('estados')->with('message','Estado '.$estado->nombre.' actualizado correctamente correctamente..');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estado $estado)
    {

        try {
            $estado->delete();
            return redirect()->route('estados')->with('message','Estado se elimino correctamente..');
        } catch (\Exception $e) {
            return redirect()->route('estados')->with('error', 'Error al eliminar, existen registros asociados' );
        }
    }
}
