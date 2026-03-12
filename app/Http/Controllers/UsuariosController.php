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
     * Controlador para gestionar los usuarios, incluyendo operaciones CRUD (Crear, Leer, Actualizar, Eliminar).
     * 
     * Cada método corresponde a una acción específica para manejar los datos de los usuarios en la aplicación.
     * 
     * - index(): Muestra una lista de todos los usuarios.
     * - create(): Muestra un formulario para crear un nuevo usuario.
     * - store(): Valida y guarda un nuevo usuario en la base de datos y envía una notificación al usuario creado.
     * - show(): Muestra los detalles de un usuario específico.
     * - edit(): Muestra un formulario para editar un usuario existente.
     * - update(): Valida y actualiza un usuario existente en la base de datos.
     * - destroy(): Elimina un usuario específico de la base de datos.
     * 
     */
    public function index()
    {
        $usuarios = usuarios::paginate(5);
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
