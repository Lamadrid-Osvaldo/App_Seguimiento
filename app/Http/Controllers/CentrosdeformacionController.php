<?php

namespace App\Http\Controllers;


use App\Models\centrosdeformacion;
use App\Models\regionales;
use Illuminate\Http\Request;

class CentrosdeformacionController extends Controller
{
    /**
     * Controlador para gestionar los centros de formación.
     * Este controlador asume que tienes un modelo Centrosdeformacion configurado para usar la tabla 
     * 'tblcentrosdeformacion' y un modelo Regionales para la tabla 'tblregionales'.
     * 
     * Cada método corresponde a una acción CRUD (Crear, Leer, Actualizar, Eliminar) para los centros de formación.
     * 
     * index() - Muestra una lista de todos los centros de formación.
     * create() - Muestra un formulario para crear un nuevo centro de formación.
     * store(Request $request) - Valida y guarda un nuevo centro de formación en la base de datos.
     * show(string $nis) - Muestra los detalles de un centro de formación específico.
     * edit(string $nis) - Muestra un formulario para editar un centro de formación específico.
     * update(Request $request, string $nis) - Valida y actualiza un centro de formación específico en la base de datos.
     * destroy(string $nis) - Elimina un centro de formación específico de la base de datos.
     * 
     * Cada método también maneja la redirección y los mensajes de éxito después de realizar las operaciones correspondientes. 
     * 
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
