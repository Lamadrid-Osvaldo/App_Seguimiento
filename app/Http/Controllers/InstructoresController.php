<?php

namespace App\Http\Controllers;

use App\Models\tiposdocumentos;
use App\Models\eps;
use App\Models\rolesadministrativos;

use App\Models\instructores;
use Illuminate\Http\Request;

class InstructoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructores = instructores::all();
        return view('instructores.index', compact('instructores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiposDocumentos = tiposdocumentos::all(); // O el nombre de tu modelo
        $eps = eps::all();
        $roles = rolesadministrativos::all();

        return view('instructores.create', compact('tiposDocumentos', 'eps', 'roles')  );
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
            'tblrolesadministrativos_nis' => 'required|integer',
        ]);

        $instructores = $request->all();

        instructores::create($instructores);

        return redirect()->route('instructores.index')
        ->with('success', 'Instructor creado exitosamente');    

    }

    /**
     * Display the specified resource.
     */
    public function show(string $nis)
    {
        $instructores = instructores::with(['tiposdocumentos', 'eps', 'rolesadministrativos'])->findOrFail($nis);
        return view('instructores.show', compact('instructores'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nis)
    {
        $instructores = instructores::findOrFail($nis);
        $tiposDocumentos = tiposdocumentos::all(); // 
        $eps = eps::all();
        $roles = rolesadministrativos::all();

        return view('instructores.edit', compact('instructores', 'tiposDocumentos', 'eps', 'roles'));
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
            'tblrolesadministrativos_nis' => 'required|integer',
        ]);

        $instructores = instructores::findOrFail($nis);
        $instructores->update($request->all());

        return redirect()->route('instructores.index')
        ->with('success', 'Instructor actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nis)
    {
        $instructores = instructores::findOrFail($nis);
        $instructores->delete();

        return redirect()->route('instructores.index')
        ->with('success', 'Instructor eliminado exitosamente');
    }
}
