<?php

namespace App\Http\Controllers;

use App\Models\programasdeformacion;
use Illuminate\Http\Request;

class ProgramasdeformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programasdeformacion = programasdeformacion::all();
        return view('programasdeformacion.index', compact('programasdeformacion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('programasdeformacion.create');
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


        $programasdeformacion = $request->all();
        

        programasdeformacion::create($programasdeformacion);

        return redirect()->route('programasdeformacion.index')
            ->with('success', 'Programa creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nis)
    {
        $programasdeformacion = programasdeformacion::findOrFail($nis);

        return view('programasdeformacion.show', compact('programasdeformacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nis)
    {
        $programasdeformacion = programasdeformacion::findOrFail($nis);

        return view('programasdeformacion.edit', compact('programasdeformacion'));
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

        $programasdeformacion = programasdeformacion::findOrFail($nis);

        $programasdeformacion->update($request->all()) ;

        return redirect()->route('programasdeformacion.index')->with('success', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nis)
    {
        $programasdeformacion = programasdeformacion::findOrFail($nis);

    
        $programasdeformacion->delete();

    
        return redirect()->route('programasdeformacion.index')->with('success', 'Registro eliminado correctamente.');
    }
}
