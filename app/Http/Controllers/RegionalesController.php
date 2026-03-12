<?php

namespace App\Http\Controllers;

use App\Models\regionales;
use Illuminate\Http\Request;

class RegionalesController extends Controller
{
    /**
     * Controlador para gestionar las regionales, incluyendo operaciones CRUD (Crear, Leer, Actualizar, Eliminar).
     * 
     * Cada método corresponde a una acción específica para manejar los datos de las regionales en la aplicación.
     * 
     * - index(): Muestra una lista de todas las regionales.
     * - create(): Muestra un formulario para crear una nueva regional.
     * - store(): Valida y guarda una nueva regional en la base de datos.
     * - show(): Muestra los detalles de una regional específica.
     * - edit(): Muestra un formulario para editar una regional existente.
     * - update(): Valida y actualiza una regional existente en la base de datos.
     * - destroy(): Elimina una regional específica de la base de datos.
     * 
     */
    public function index()
    {
        $regionales = regionales::all();
        return view('regionales.index', compact('regionales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('regionales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|integer',
            'denominacion' => 'required|string|max:100',
            'observaciones' => 'nullable|string|max:200',
        ]);


        $regionales = $request->all();
        

        regionales::create($regionales);

        return redirect()->route('regionales.index')
            ->with('success', 'Regional creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nis)
    {

        $regionales = regionales::findOrFail($nis);

        return view('regionales.show', compact('regionales'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nis)
    {
         $regionales = regionales::findOrFail($nis);

        return view('regionales.edit', compact('regionales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nis)
    {
         $request->validate([
            'codigo' => 'required|integer',
            'denominacion' => 'required|string|max:100',
            'observaciones' => 'nullable|string|max:200',
        ]);

        $regionales = regionales::findOrFail($nis);

        $regionales->update($request->all()) ;

        return redirect()->route('regionales.index')->with('success', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nis)
    {
         $regionales = regionales::findOrFail($nis);

    
        $regionales->delete();

    
        return redirect()->route('regionales.index')->with('success', 'Registro eliminado correctamente.');
    }
}
