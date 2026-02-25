<?php

namespace App\Http\Controllers;


use App\Models\fichasdecaracterizacion;
use App\Models\programasdeformacion;
use App\Models\centrosdeformacion;

use Illuminate\Http\Request;

class FichasdecaracterizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fichasdecaracterizacion = fichasdecaracterizacion::all();
        $programasdeformacion = programasdeformacion::all();
        $centrosdeformacion = centrosdeformacion::all();
        return view('fichasdecaracterizacion.index', compact('fichasdecaracterizacion','programasdeformacion','centrosdeformacion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programasdeformacion = programasdeformacion::all();
        $centrosdeformacion = centrosdeformacion::all();

        return view('fichasdecaracterizacion.create', compact('programasdeformacion', 'centrosdeformacion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required',
            'denominacion' => 'string|required|max:100',
            'cupo' => 'integer|required|max:200',
            'fechainicio' => 'required|date',
            'fechafin' => 'required|date|after:fecha_inicio',
            'tblcentrosdeformacion_nis' => 'required|exists:tblcentrosdeformacion,nis',
            'tblprogramasdeformacion_nis' => 'required|exists:tblprogramasdeformacion,nis',
        ]);

        $fichasdecaracterizacion = $request->all();

       

        fichasdecaracterizacion::create($fichasdecaracterizacion);

        return redirect()->route('fichasdecaracterizacion.index')
        ->with('success', 'Ficha de caracterización creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nis)
    {
        $fichasdecaracterizacion = fichasdecaracterizacion::with(['programasdeformacion', 'centrosdeformacion'])->findOrFail($nis);


        return view('fichasdecaracterizacion.show', compact('fichasdecaracterizacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nis)
    {
        $fichasdecaracterizacion = fichasdecaracterizacion::findOrFail($nis);
        $programasdeformacion = programasdeformacion::all();
        $centrosdeformacion = centrosdeformacion::all();
        return view('fichasdecaracterizacion.edit', compact('fichasdecaracterizacion', 'programasdeformacion', 'centrosdeformacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nis)
    {
        $fichasdecaracterizacion = fichasdecaracterizacion::findOrFail($nis);
        $request->validate([
            'codigo' => 'required',
            'denominacion' => 'string|required|max:100',
            'cupo' => 'integer|required|max:200',
            'fechainicio' => 'required|date',
            'fechafin' => 'required|date|after:fecha_inicio',
            'tblcentrosdeformacion_nis' => 'required|exists:tblcentrosdeformacion,nis',
            'tblprogramasdeformacion_nis' => 'required|exists:tblprogramasdeformacion,nis',
        ]);
        $fichasdecaracterizacion->update($request->all());
        return redirect()->route('fichasdecaracterizacion.index')
        ->with('success', 'Ficha de caracterización actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nis)
    {
        $fichasdecaracterizacion = fichasdecaracterizacion::findOrFail($nis);
        $fichasdecaracterizacion->delete();
        return redirect()->route('fichasdecaracterizacion.index')
        ->with('success', 'Ficha de caracterización eliminada exitosamente');
    }
}
