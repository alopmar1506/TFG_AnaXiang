<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Mascota;
use App\Models\Usuario;


class mascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $direccion = $request->input('direccion');

        // Filtrado de usuarios por dirección
        if ($direccion) {
            $usuarios = Usuario::where('direccion', 'LIKE', '%' . $direccion . '%')->get();
        } else {
            $usuarios = Usuario::all();
        }

        // Obtener todas las mascotas
        $mascotas = Mascota::all();

        return view('index', compact('usuarios', 'mascotas'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mascotas/crearMascota');

    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'nombreMascota' => 'required',
            'especie' => 'required',
            'tamanio' => 'required',
            'fotoMascota' => 'required|image|max:2048',
        ]);

        $fotoPath = $request->file('fotoMascota')->store('mascotas', 'public');

        Mascota::create([
            'nombreMascota' => $request->nombreMascota,
            'especie' => $request->especie,
            'tamanio' => $request->tamanio,
            'fotoMascota' => $fotoPath,
            'usuario_id' => Auth::id(), // 👈 Aquí se asigna el usuario autenticado
        ]);

        return redirect()->route('perfilUsuario');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
