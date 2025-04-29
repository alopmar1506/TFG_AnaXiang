<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios/crearUsuario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'email' => 'required|unique:usuarios',
            'contrasena' => 'required|unique:usuarios',
            'especie'=> 'required',
            'rol' => 'nullable',   
            'fotoUsuario'=> 'required', 
            'descripcion'=> 'required',      
            'opinion'=>'nullable',     
            'nombreMascota'=>'required',
            'tamanio'=>'required',
            'fotoMascota'=>'required',
        ]);
        Usuario::create($request->all());
        return redirect()->route('handspaws');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuarios, string $id)
    {
        $usuarios=Usuario::findOrFail($id);
        $mascota = $usuarios->mascotas;
        return view('usuarios/perfilUsuario', compact('perfilUsuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        return view('usuarios/editarUsuario', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'email' => 'required|unique:usuarios',
            'contrasena' => 'required|unique:usuarios',
            'especie'=> 'required',
            'rol' => 'requiered',   
            'fotoUsuario'=> 'required', 
            'descripcion'=> 'required',      
            'opinion'=>'nullable',     
            'nombreMascota'=>'nullable',
            'tamanio'=>'nullable',
            'fotoMascota'=>'nullable',
        ]);
        $usuario->update($request->all());
        return redirect()->route('index');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuarios=Usuario::findOrFail($id);
        $usuarios->delete();
        return redirect()->route('concesionario', $usuarios->id)->with('success','Uusario eliminado correctamente');
    }
}
