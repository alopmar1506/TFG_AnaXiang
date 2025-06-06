<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ciudad = $request->input('direccion');

        if ($ciudad) {
            $usuarios = Usuario::where('direccion', 'LIKE', '%' . $ciudad . '%')->get();
        } else {
            $usuarios = Usuario::all();
        }

        return view('index', compact('usuarios'));
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
            'contrasena' => 'required',
            'rol' => 'nullable',
            'fotoUsuario' => 'required',
            'descripcion' => 'required',
            'opinion' => 'nullable',
        ]);

        $fotoPathUsuario = $request->file('fotoUsuario')->store('usuarios', 'public');


        Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'direccion' => $request->direccion,
            'email' => $request->email,
            'contrasena' => Hash::make($request->contrasena),
            'rol' => $request->rol,
            'fotoUsuario' => $fotoPathUsuario,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('handspaws');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        $mascota = $usuario->mascotas; 

        return view('usuarios/perfilUsuario', compact('usuario', 'mascota'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios/editarUsuario', compact('usuario'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'nombre' => 'nullable',
            'apellido' => 'nullable',
            'direccion' => 'nullable',
            'fotoUsuario' => 'nullable|image',
            'rol' => 'nullable',
            'descripcion' => 'nullable',
        ]);

        $datos = $request->except('fotoUsuario');

        if ($request->hasFile('fotoUsuario')) {
            $fotoPath = $request->file('fotoUsuario')->store('fotos', 'public');
            $datos['fotoUsuario'] = $fotoPath;
        } else {
            $datos['fotoUsuario'] = $usuario->fotoUsuario;
        }

        $usuario->update($datos);

        return redirect()->route('perfilUsuario', $usuario->id);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect()->route('handspaws')->with('success', 'Usuario eliminado correctamente');
    }
}
