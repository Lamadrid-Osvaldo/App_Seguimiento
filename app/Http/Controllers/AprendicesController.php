<?php

namespace App\Http\Controllers;

use App\Models\aprendices;
use App\Models\eps;
use App\Models\fichasdecaracterizacion;
use App\Models\tiposdocumentos;
use Illuminate\Http\Request;

class AprendicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aprendices = aprendices:: all();
        return view('aprendices.index', compact('aprendices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiposDocumentos = tiposdocumentos::all(); // O el nombre de tu modelo
        $eps = eps::all();
        $fichas = fichasdecaracterizacion::all();

        return view('aprendices.create', compact('tiposDocumentos', 'eps', 'fichas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'numdoc' => 'required|integer',
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'direccion' => 'required|string|max:200',
            'telefono' => 'required|string|max:50',
            'correoinstitucional' => 'required|string|max:50',
            'correopersonal' => 'required|string|max:50',
            'sexo' => 'required|integer|max:2',
            'fechanac' => 'required|date',
            'tbltiposdocumentos_nis' => 'required|integer',
            'tbleps_nis' => 'required|integer',
            'tblfichasdecaracterizacion_nis' => 'required|integer',
        ]);

        $aprendices = $request->all();

        aprendices::create($aprendices);

        return redirect()->route('aprendices.index')
        ->with('success', 'Aprendiz creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nis)
    {
        $aprendices = aprendices::with(['tiposdocumentos', 'eps', 'fichasdecaracterizacion'])->findOrFail($nis);

    
        return view('aprendices.show', compact('aprendices'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nis)
    {
        $aprendices = aprendices::findOrFail($nis);
        $tiposDocumentos = tiposdocumentos::all(); // 
        $eps = eps::all();
        $fichas = fichasdecaracterizacion::all();

        return view('aprendices.edit', compact('aprendices', 'tiposDocumentos', 'eps', 'fichas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nis)
    {
        $request->validate([
            'numdoc' => 'required|integer',
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'direccion' => 'required|string|max:200',
            'telefono' => 'required|string|max:50',
            'correoinstitucional' => 'required|string|max:50',
            'correopersonal' => 'required|string|max:50',
            'sexo' => 'required|integer|max:2',
            'fechanac' => 'required|date',
            'tbltiposdocumentos_nis' => 'required|integer',
            'tbleps_nis' => 'required|integer',
            'tblfichasdecaracterizacion_nis' => 'required|integer',
        ]);

        $aprendices = aprendices::findOrFail($nis);
        $aprendices->update($request->all());

        return redirect()->route('aprendices.index')
        ->with('success', 'Aprendiz actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aprendices = aprendices::findOrFail($id);
        $aprendices->delete();

        return redirect()->route('aprendices.index')
        ->with('success', 'Aprendiz eliminado exitosamente');
    }
}
