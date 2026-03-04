<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Notifications\Notificationes;
use App\Models\usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;      

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = usuarios::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tblusuarios',
            'contrasena' => 'required|string|min:8|confirmed',
        ],[
            'contrasena.confirmed' => 'La confirmación de la contraseña no coincide.',
            'contrasena.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ]);
        

         $usuarios = usuarios::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'contrasena' => Hash::make($request->contrasena),
        ]);

        $usuarios->notify(new Notificationes($usuarios));

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nis)
    {

        $usuario = usuarios::findOrFail($nis);
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nis)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tblusuarios,email,' . $nis . ',nis',
            'contrasena' => 'required|string|min:8|confirmed',
        ],[
            'contrasena.confirmed' => 'La confirmación de la contraseña no coincide.',
            'contrasena.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ]);

        $usuario = usuarios::findOrFail($nis);
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;

        if ($request->filled('contrasena')) {
            $usuario->contrasena = Hash::make($request->contrasena);
        }

        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nis)
    {
        $usuario = usuarios::findOrFail($nis);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
