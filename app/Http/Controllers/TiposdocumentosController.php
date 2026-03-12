<?php

namespace App\Http\Controllers;

use App\Models\tiposdocumentos;
use Illuminate\Http\Request;

class TiposdocumentosController extends Controller
{
    /**
     * Controlador para gestionar los tipos de documentos, incluyendo operaciones CRUD (Crear, Leer, Actualizar, Eliminar).
     * 
     * Cada método corresponde a una acción específica para manejar los datos de los tipos de documentos en la aplicación.
     * 
     * - index(): Muestra una lista de todos los tipos de documentos.
     * - create(): Muestra un formulario para crear un nuevo tipo de documento.
     * - store(): Valida y guarda un nuevo tipo de documento en la base de datos.
     * - show(): Muestra los detalles de un tipo de documento específico.
     * - edit(): Muestra un formulario para editar un tipo de documento existente.
     * - update(): Valida y actualiza un tipo de documento existente en la base de datos.
     * - destroy(): Elimina un tipo de documento específico de la base de datos.
     * 
     */
    public function index()
    {
        $tiposdocumentos = tiposdocumentos::all();
        return view('tiposdocumentos.index', compact('tiposdocumentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('tiposdocumentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'denominacion' => 'required|string|max:100',
            'observaciones' => 'nullable|string|max:200',
        ]);


        $tiposdocumentos = $request->all();
        

        tiposdocumentos::create($tiposdocumentos);

        return redirect()->route('tiposdocumentos.index')
            ->with('success', 'Tipo de documento creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nis)
    {
        $tiposdocumentos = tiposdocumentos::findOrFail($nis);

        return view('tiposdocumentos.show', compact('tiposdocumentos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nis)
    {
        $tiposdocumentos = tiposdocumentos::findOrFail($nis);

        return view('tiposdocumentos.edit', compact('tiposdocumentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nis)
    {
        $request->validate([
            
            'denominacion' => 'required|string|max:100',
            'observaciones' => 'nullable|string|max:200',
        ]);

        $tiposdocumentos = tiposdocumentos::findOrFail($nis);

        $tiposdocumentos->update($request->all()) ;

        return redirect()->route('tiposdocumentos.index')->with('success', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nis)
    {
        $tiposdocumentos = tiposdocumentos::findOrFail($nis);

    
        $tiposdocumentos->delete();

    
        return redirect()->route('tiposdocumentos.index')->with('success', 'Registro eliminado correctamente.');
    }
}
