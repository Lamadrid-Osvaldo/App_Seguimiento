<?php

namespace App\Http\Controllers;

use App\Models\rolesadministrativos;
use Illuminate\Http\Request;


class RolesadministrativosController extends Controller
{

    /**
     * Controlador para gestionar los roles administrativos, incluyendo operaciones CRUD (Crear, Leer, Actualizar, Eliminar).
     * 
     * Cada método corresponde a una acción específica para manejar los datos de los roles administrativos en la aplicación.
     * 
     * - index(): Muestra una lista de todos los roles administrativos.
     * - create(): Muestra un formulario para crear un nuevo rol administrativo.
     * - store(): Valida y guarda un nuevo rol administrativo en la base de datos.
     * - show(): Muestra los detalles de un rol administrativo específico.
     * - edit(): Muestra un formulario para editar un rol administrativo existente.
     * - update(): Valida y actualiza un rol administrativo existente en la base de datos.
     * - destroy(): Elimina un rol administrativo específico de la base de datos.
     * 
     */
    
    public function index()
    {
        $rolesadministrativos = rolesadministrativos::all();
        return view('rolesadministrativos.index', compact('rolesadministrativos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
                return view('rolesadministrativos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:200',
        ]);


        $rolesadministrativos = $request->all();
        

        rolesadministrativos::create($rolesadministrativos);

        return redirect()->route('rolesadministrativos.index')
            ->with('success', 'Rol administrativo creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nis)
    {
        $rolesadministrativos = rolesadministrativos::findOrFail($nis);

        return view('rolesadministrativos.show', compact('rolesadministrativos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nis)
    {
        $rolesadministrativos = rolesadministrativos::findOrFail($nis);

        return view('rolesadministrativos.edit', compact('rolesadministrativos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nis)
    {
        $request->validate([
            'descripcion' => 'nullable|string|max:200',
        ]);

        $rolesadministrativos = rolesadministrativos::findOrFail($nis);

        $rolesadministrativos->update($request->all()) ;

        return redirect()->route('rolesadministrativos.index')->with('success', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nis)
    {
        $rolesadministrativos = rolesadministrativos::findOrFail($nis);

    
        $rolesadministrativos->delete();

    
        return redirect()->route('rolesadministrativos.index')->with('success', 'Registro eliminado correctamente.');
    }
}
