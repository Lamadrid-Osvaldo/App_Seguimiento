<?php

namespace App\Http\Controllers;


use App\Models\centrosdeformacion;
use App\Models\regionales;
use Illuminate\Http\Request;

class CentrosdeformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $centrosdeformacion = centrosdeformacion::all();
        $regionales = regionales::all();
        return view('centrosdeformacion.index', compact('centrosdeformacion', 'regionales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regionales = regionales::all();
        return view('centrosdeformacion.create', compact('regionales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required',
            'denominacion' => 'string|required|max:100',
            'direccion' => 'string|required|max:200',
            'observaciones' => 'string|max:200',
            'tblregionales_nis' => 'required|exists:tblregionales,nis',
        ]);

        $centrosdeformacion = $request->all();

        centrosdeformacion::create($centrosdeformacion);

        return redirect()->route('centrosdeformacion.index')
        ->with('success', 'Centro de formación creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nis)
    {
        $centrosdeformacion = centrosdeformacion::findOrFail($nis);
        $regionales = regionales::all();
        return view('centrosdeformacion.show', compact('centrosdeformacion', 'regionales'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nis)
    {
        $centrosdeformacion = centrosdeformacion::findOrFail($nis);
        $regionales = regionales::all();
        return view('centrosdeformacion.edit', compact('centrosdeformacion', 'regionales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nis)
    {
        $request->validate([
            'codigo' => 'required',
            'denominacion' => 'string|required|max:100',
            'direccion' => 'string|required|max:200',
            'observaciones' => 'nullable|string|max:200',
            'tblregionales_nis' => 'required|exists:tblregionales,nis',
        ]);

        $centrosdeformacion = centrosdeformacion::findOrFail($nis);
        $centrosdeformacion->update($request->all());

        return redirect()->route('centrosdeformacion.index')
        ->with('success', 'Centro de formación actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nis)
    {
        $centrosdeformacion = centrosdeformacion::findOrFail($nis);
        $centrosdeformacion->delete();

        return redirect()->route('centrosdeformacion.index')
        ->with('success', 'Centro de formación eliminado exitosamente');
    }
}
