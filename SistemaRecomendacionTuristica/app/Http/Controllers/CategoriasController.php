<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Estado;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estados = Estado::all();
        $categorias = Categoria::with('estado')->get();
        return view('admin.categorias', compact('estados','categorias'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->idEstado = $request->idEstado;
        $categoria->save();
        return redirect()->route('categoria');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria =Categoria::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->idEstado = $request->idEstado;
        $categoria->save();
        return redirect()->route('categoria');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categoria');

    }
}
