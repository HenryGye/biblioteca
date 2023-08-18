<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::with('categoria')->get();
        return response()->json($libros);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $libro = Libro::create($request->post());
        return response()->json([
            'mensaje' => 'Libro creado',
            'libro'=>$libro
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        return response()->json($libro);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $libro = Libro::find($id);
        $libro->categoria_id = $request->categoria_id;
        $libro->autor = $request->autor;
        $libro->nombre = $request->nombre;
        $libro->precio = $request->precio;
        $libro->fecha_lanzamiento = $request->fecha_lanzamiento;
        $libro->rentado = $request->rentado;
        $libro->save();

        return response()->json([
            'mensaje' => 'Libro actualizado',
            'libro'=>$libro
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();
        return response()->json(['mensaje'=>'Libro eliminado']);
    }

    public function rentaLibro($id) {
        $libro = Libro::findOrFail($id);

        if (!$libro->rentado) {
            $libro->rentado = !$libro->rentado;
            $libro->save();
            return response()->json(['mensaje'=>'Libro rentado']);
        }
    }

    public function listarLibrosDisponibles(Request $request)
    {
        $query = Libro::with('categoria')->where('rentado', false)->orderBy('fecha_lanzamiento')->orderBy('nombre');

        if ($request->has('categoria_id')) {
            $query->where('categoria_id', $request->categoria_id);
        }

        $libros = $query->paginate(10);

        return response()->json($libros);
    }
}
