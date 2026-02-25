<?php

namespace App\Http\Controllers;

use App\Models\tiposdocumentos;
use Illuminate\Http\Request;

class TiposdocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
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
