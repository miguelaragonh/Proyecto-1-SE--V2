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
        return view('admin.categorias', compact('estados', 'categorias'));
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
        return redirect()->route('categoria')->with('message', 'La categoria se agrego correctamente..');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria = Categoria::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->idEstado = $request->idEstado;
        $categoria->save();
        return redirect()->route('categoria')->with('message', 'La categoria ' . $categoria->nombre . ' se actualizo correctamente..');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        try {
            $categoria->delete();

            return redirect()->route('categoria')->with('message', 'La categoría se elimino correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('categoria')->with('error', 'Error al eliminar la categoría existen lugares asociados' );
        }
    }
}
