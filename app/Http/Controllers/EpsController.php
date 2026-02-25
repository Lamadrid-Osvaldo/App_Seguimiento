<?php

namespace App\Http\Controllers;

use App\Models\eps;
use Illuminate\Http\Request;

class EpsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eps = eps::all();
        return view('eps.index', compact('eps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'numdoc' => 'required|integer',
            'denominacion' => 'required|string|max:100',
            'observaciones' => 'nullable|string|max:200',
        ]);


        $eps = $request->all();
        

        eps::create($eps);


        /*$eps = eps::create([
            'numdoc' => $request->numdoc,
            'denominacion' => $request->denominacion,
            'observaciones' => $request->observaciones,
        ]);*/
        return redirect()->route('eps.index')
            ->with('success', 'EPS creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nis)  
    {
        $eps = eps::findOrFail($nis);

        return view('eps.show', compact('eps'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nis)
    {

        $eps = eps::findOrFail($nis);

        return view('eps.edit', compact('eps'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nis)
    {
        
        $request->validate([
            'numdoc' => 'required|integer',
            'denominacion' => 'required|string|max:100',
            'observaciones' => 'nullable|string|max:200',
        ]);

        $eps = eps::findOrFail($nis);

        $eps->update($request->all()) ;

        return redirect()->route('eps.index')->with('success', 'Actualizado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $nis)
    {
        $eps = eps::findOrFail($nis);

    
        $eps->delete();

    
        return redirect()->route('eps.index')->with('success', 'Registro eliminado correctamente.');
    }
}
