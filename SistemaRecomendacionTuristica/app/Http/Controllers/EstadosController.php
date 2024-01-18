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
        return redirect()->route('estados');
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
        return redirect()->route('estados');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estado $estado)
    {
        $estado->delete();
        return redirect()->route('estados');
    }
}
