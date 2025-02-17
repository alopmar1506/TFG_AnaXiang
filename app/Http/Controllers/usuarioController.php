<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;


class usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query=Usuario::query();
        $usuarios=Usuario::all();
        $ubicacionFIltrada=$request->ubicacion;
        if($request->has('ubicacion')){ //COMPRUEBA QUE SE HAY UN CAMPO "NOMBRE"
            $query->where('ubicacion','like','%'.$request->ubicacion.'%');
        };
        $coches= $query->get();
        return view('handspaws',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $coche=Usuario::findOrFail($id);
        return view('mostrarUsuarios',compact('usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
