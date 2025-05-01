<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class perfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios=Usuario::all();
        return view('usuarios/iniciarSesion');
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
        $request->validate([
            'email' => 'required|email',
            'contrasena' => 'required',
        ]);

        $credentials = $request->only('email', 'contrasena');
        if (Usuario::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('usuario');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Buscar el usuario por ID
        $usuario = Usuario::find($id);
    
        // Verificar si el usuario existe
        if (!$usuario) {
            return redirect()->route('handspaws')->with('error', 'Usuario no encontrado.');
        }
    
        return view('perfilUsuario', compact('usuario'));
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
