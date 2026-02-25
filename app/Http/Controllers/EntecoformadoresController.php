<?php

namespace App\Http\Controllers;

use App\Models\entecoformadores;
use Illuminate\Http\Request;

class EntecoformadoresController extends Controller
{
    /**
     * Display a listing of the resource.
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
