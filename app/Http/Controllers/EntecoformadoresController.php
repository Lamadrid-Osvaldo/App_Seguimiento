<?php

namespace App\Http\Controllers;

use App\Models\entecoformadores;
use Illuminate\Http\Request;

class EntecoformadoresController extends Controller
{
    /**
     * Controlador para gestionar los entecoformadores, incluyendo operaciones CRUD (Crear, Leer, Actualizar, Eliminar).
     * 
     * Cada método corresponde a una acción específica para manejar los datos de los entecoformadores en la aplicación.
     * 
     * - index(): Muestra una lista paginada de todos los entecoformadores.
     * - create(): Muestra un formulario para crear un nuevo entecoformador.
     * - store(): Valida y guarda un nuevo entecoformador en la base de datos.
     * - show(): Muestra los detalles de un entecoformador específico.
     * - edit(): Muestra un formulario para editar un entecoformador existente.
     * - update(): Valida y actualiza un entecoformador existente en la base de datos.
     * - destroy(): Elimina un entecoformador específico de la base de datos.
     * 
     */
    public function index()
    {
        $entecoformadores = entecoformadores::all();
        return view('entecoformadores.index', compact('entecoformadores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('entecoformadores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tdoc' => 'required|integer',
            'numdoc' => 'required|integer',
            'razonsocial' => 'required|string|max:100',
            'direccion' => 'nullable|string|max:200',
            'telefono' => 'nullable|string|max:50',
            'correoinstitucional' => 'nullable|string|max:50',
        ]);


        $entecoformadores = $request->all();
        

        entecoformadores::create($entecoformadores);

        return redirect()->route('entecoformadores.index')
            ->with('success', 'Entecoformador creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nis)
    {
        $entecoformadores = entecoformadores::findOrFail($nis);

        return view('entecoformadores.show', compact('entecoformadores'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nis)
    {
        $entecoformadores = entecoformadores::findOrFail($nis);

        return view('entecoformadores.edit', compact('entecoformadores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nis)
    {
        $request->validate([
            'tdoc' => 'required|integer',
            'numdoc' => 'required|integer',
            'razonsocial' => 'required|string|max:100',
            'direccion' => 'nullable|string|max:200',
            'telefono' => 'nullable|string|max:50',
            'correoinstitucional' => 'nullable|string|max:50',
        ]);

        $entecoformadores = entecoformadores::findOrFail($nis);

        $entecoformadores->update($request->all()) ;

        return redirect()->route('entecoformadores.index')->with('success', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nis)
    {
        $entecoformadores = entecoformadores::findOrFail($nis);

    
        $entecoformadores->delete();

    
        return redirect()->route('entecoformadores.index')->with('success', 'Registro eliminado correctamente.');
    
    }
}
