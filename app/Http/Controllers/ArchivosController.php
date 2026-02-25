<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\archivos;
use Illuminate\Http\Request;


class ArchivosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $archivos = archivos:: all();
        return view('archivos.index', compact('archivos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('archivos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
   {
    $request->validate([
        'archivo_file' => 'required|file|mimes:pdf,jpg,png,docx|max:5120',
    ]);

    if($request->hasFile('archivo_file')) {
        $file = $request->file('archivo_file');
        
        // 1. Limpiamos el nombre (evitar eñes y espacios que rompen enlaces)
        $nombreOriginal = $file->getClientOriginalName();

        // 2. Guardamos físicamente en storage/app/public/archivos
        // El método storeAs ya sabe que si usas el disco 'public', debe ir a esa carpeta
        $nombreSistema = time() . '_' . $nombreOriginal;
        $file->storeAs('archivosme', $nombreSistema, 'public');

        // 3. Obtenemos el tipo (extensión o mime)
        $tipo = $file->getClientOriginalExtension();

        // 4. Guardamos en la BD
        // OJO: La ruta debe ser solo 'archivos/nombre' porque el asset('storage/...') ya pone el 'storage/'
        archivos::create([
            'nombre_original' => $nombreOriginal,
            'ruta' => 'archivosme/' . $nombreSistema, 
            'tipo' => $tipo,
            'created_at' => now(),
        ]);

        return redirect()->route('archivos.index')
            ->with('success', 'Archivo subido exitosamente');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nis)
    {
        $archivo = archivos::findOrFail($nis);

        // 2. Borrar el archivo físico del disco 'public'
        // $archivo->ruta contiene "archivosme/nombre_archivo.pdf"
        if (Storage::disk('public')->exists($archivo->ruta)) {
            Storage::disk('public')->delete($archivo->ruta);
        }

        // 3. Borrar el registro de la base de datos
        $archivo->delete();

        // 4. Redirigir con mensaje de éxito
        return redirect()->route('archivos.index')
            ->with('success', 'Archivo y registro eliminados correctamente.');
    }
}
