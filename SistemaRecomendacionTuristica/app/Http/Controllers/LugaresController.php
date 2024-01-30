<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Estado;
use App\Models\Historial;
use App\Models\Lugar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Monolog\Handler\IFTTTHandler;

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
        return view('admin.lugares', compact('estados', 'categorias', 'lugares'));
    }


    public function lugares(Request $request)
    {
        $usuario = auth()->user();
        $nombre = $request->input('text');
        $preferencia = $usuario->preferencia;
        if ($preferencia != null) {
            $lugares = Lugar::with('estado', 'categoria')->orderByDesc(DB::raw("idCategoria = '{$preferencia}'"))->get();
        } else {
            $lugares = Lugar::with('estado', 'categoria')->get();
        }
        return view('welcome', compact('lugares'));
    }


    public function buscarLugar(Request $request)
    {
        $nombre = $request->input('text');
        if ($nombre != null) {
            $query = Lugar::with('estado', 'categoria');
            $query->where('nombre', 'like', '%' . $nombre . '%');
            $lugares = $query->get();
            $this->nuevoHIstorial($query);
            return view('welcome', compact('lugares'));
        } else {
            $lugares = Lugar::with('estado', 'categoria')->get();
            return view('welcome', compact('lugares'));
        }
    }

    public function nuevoHIstorial($query)
    {
        if ($query->count() > 0) {
            $historial = new Historial();
            $historial->idUsuario = auth()->user()->id;
            $historial->idLugar = $query->first()->id;
            $historial->idCategoria = $query->first()->idCategoria;
            $historial->fecha = now();
            $historial->save();
        }
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
        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $lugar->imagen = $this->guardarImg($request);
        } else {
            $lugar->imagen = null;
        }
        $lugar->save();
        return redirect()->route('lugar')->with('message', 'Lugar se agrego correctamente..');
    }

    public function guardarImg(Request $request)
    {
        if ($request->isMethod('POST')) {
            $file = $request->file('imagen');
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
        return redirect()->route('lugar')->with('message', 'Lugar ' . $lugar->nombre . ' actualizado correctamente correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lugar $lugar)
    {
        $lugar->delete();
        return redirect()->route('lugar')->with('message', 'Lugar se elimino correctamente..');
    }
}
