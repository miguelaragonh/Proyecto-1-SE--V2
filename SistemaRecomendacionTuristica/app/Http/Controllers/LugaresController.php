<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Estado;
use App\Models\Lugar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LugaresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estados = Estado::all();
        $categorias = Categoria::all();
        $lugares = Lugar::with('estado', 'categoria')->get();
       //var_dump($lugares->imagen);

        return view('admin.lugares', compact('estados', 'categorias', 'lugares'));
    }


    public function lugares()
    {
        $lugares = Lugar::with('estado', 'categoria')->get();
        return view('welcome', compact('lugares'));
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request->all();
        $lugar = new Lugar();
        $lugar->nombre = $request->nombre;
        $lugar->descripcion = $request->descripcion;
        $lugar->ubicacion = $request->ubicacion;
        $lugar->idEstado = $request->idEstado;
        $lugar->idCategoria = $request->idCategoria;
        $lugar->imagen = $this->guardarImg($request);
        $lugar->save();
        return redirect()->route('lugar');
    }

    public function guardarImg(Request $request){
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
        $lugar = Lugar::find($id);
        $lugar->nombre = $request->nombre;
        $lugar->descripcion = $request->descripcion;
        $lugar->ubicacion = $request->ubicacion;
        $lugar->idEstado = $request->idEstado;
        $lugar->idCategoria = $request->idCategoria;



        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $lugar->imagen = $this->guardarImg($request);
        } else {
            $lugar->imagen = $lugar->imagen;

        }
        $lugar->save();
        return redirect()->route('lugar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lugar $lugar)
    {
        $lugar->delete();
        return redirect()->route('lugar');
    }
}
