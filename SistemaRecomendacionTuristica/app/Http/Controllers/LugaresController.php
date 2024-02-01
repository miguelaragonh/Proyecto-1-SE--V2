<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Estado;
use App\Models\Historial;
use App\Models\Lugar;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Monolog\Handler\IFTTTHandler;
use Symfony\Component\VarDumper\VarDumper;

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
        $historial = $this->conteoHistorial($usuario);
        $categoriaMasBuscada = array_search(max($historial), $historial);
        if ($preferencia != null) {
            $lugares = Lugar::with('estado', 'categoria')
                ->orderByDesc(DB::raw("idCategoria = '{$preferencia}'"))->get();
        } elseif ($categoriaMasBuscada == 3) {
            $lugares = Lugar::with('estado', 'categoria')
                ->orderByDesc(DB::raw("idCategoria = '{$categoriaMasBuscada}'"))->get();
        } elseif ($categoriaMasBuscada == 4) {
            $lugares = Lugar::with('estado', 'categoria')
                ->orderByDesc(DB::raw("idCategoria = '{$categoriaMasBuscada}'"))->get();
        } elseif ($categoriaMasBuscada == 5) {
            $lugares = Lugar::with('estado', 'categoria')
                ->orderByDesc(DB::raw("idCategoria = '{$categoriaMasBuscada}'"))->get();
        } else {
            $lugares = Lugar::with('estado', 'categoria')->get();
        }
        return view('welcome', compact('lugares', 'categoriaMasBuscada', 'preferencia'));
    }


    public function conteoHistorial($usuario)
    {
        $categorias = Categoria::all();
        $historial = array();
        $historial[0] = 0;
        foreach ($categorias as $categoria) {
            $historial[$categoria->id] =
                Historial::where('idUsuario', $usuario->id)
                ->where('idCategoria', $categoria->id)
                ->count();
        }
        return $historial;
    }


    public function buscarLugar(Request $request)
    {
        $nombre = $request->input('text');
        $usuario = auth()->user();
        $preferencia = $usuario->preferencia;
        $historial = $this->conteoHistorial($usuario);
        $categoriaMasBuscada = array_search(max($historial), $historial);
        if ($nombre != null) {
            $query = Lugar::with('estado', 'categoria');
            $query->where('nombre', 'like', '%' . $nombre . '%');
            $lugares = $query->get();
            $this->nuevoHistorial($query);
            return view('welcome', compact('lugares', 'categoriaMasBuscada', 'preferencia'));
        } else {
            $lugares = Lugar::with('estado', 'categoria')->get();
            return view('welcome', compact('lugares', 'categoriaMasBuscada', 'preferencia'));
        }
    }

    public function nuevoHistorial($query)
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
        $lugar->gmap = $request->gmap;
        $lugar->idEstado = $request->idEstado;
        $lugar->idCategoria = $request->idCategoria;
        $lugar->gmap = ($request->gmap) ? $request->gmap : '#';
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
        $lugar->gmap = ($request->gmap) ? $request->gmap : '#';
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

        try {
            $lugar->delete();
            return redirect()->route('lugar')->with('message', 'Lugar se elimino correctamente..');
        } catch (\Exception $e) {
            return redirect()->route('lugar')->with('error', 'Error al eliminar, existen registros asociados' );
        }

    }
}
