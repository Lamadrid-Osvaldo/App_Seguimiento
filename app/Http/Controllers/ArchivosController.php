<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\archivos;
use Illuminate\Http\Request;


class ArchivosController extends Controller
{
    /**
     * Controlador de archivos, con métodos para listar, crear, mostrar, editar, actualizar y eliminar archivos.
     * 
     * index(): Obtiene todos los archivos y los muestra en la vista 'archivos.index'.
     * 
     * create(): Muestra el formulario para subir un nuevo archivo.
     * 
     * store(Request $request): Valida y almacena un nuevo archivo en el sistema de archivos y en la base de datos,
     *  luego redirige a la lista de archivos con un mensaje de éxito.
     * 
     * show(string $nis): Muestra los detalles de un archivo específico (no implementado en este caso).
     * 
     * edit(string $nis): Muestra el formulario para editar un archivo específico.
     * 
     * update(Request $request, string $nis): Valida y actualiza un archivo específico en el sistema de archivos
     * y en la base de datos, luego redirige a la lista de archivos con un mensaje de éxito.
     * 
     * destroy(string $nis): Elimina un archivo específico del sistema de archivos y de la base de datos,
     * luego redirige a la lista de archivos con un mensaje de éxito.
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
        
        // 1. Limpiamos el nombre original para evitar problemas con caracteres especiales
        $nombreOriginal = $file->getClientOriginalName();

        // 2. Guardamos físicamente en storage/app/public/archivos
        // El método storeAs ya sabe que si usas el disco 'public', debe ir a esa carpeta
        date_default_timezone_set('America/Bogota');
        $date = date('Y-m-d-H-i-s');
        $nombreSistema = $date . '_' . $nombreOriginal;
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
    public function edit(string $nis)
    {
        $archivo = archivos::findOrFail($nis);
        return view('archivos.edit', compact('archivo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nis)
    {
        $request->validate([
            'archivo_file' => 'nullable|file|mimes:pdf,jpg,png,docx|max:5120',
        ]);

        $archivo = archivos::findOrFail($nis);

        if($request->hasFile('archivo_file')) {
            // 1. Borrar el archivo físico anterior
            if (Storage::disk('public')->exists($archivo->ruta)) {
                Storage::disk('public')->delete($archivo->ruta);
            }

            // 2. Subir el nuevo archivo
            $file = $request->file('archivo_file');
            $nombreOriginal = $file->getClientOriginalName();
            date_default_timezone_set('America/Bogota');
            $date = date('Y-m-d-H-i-s');
            $nombreSistema = $date . '_' . $nombreOriginal;
            $file->storeAs('archivosme', $nombreSistema, 'public');
            $tipo = $file->getClientOriginalExtension();

            // 3. Actualizar el registro en la BD
            $archivo->update([
                'nombre_original' => $nombreOriginal,
                'ruta' => 'archivosme/' . $nombreSistema,
                'tipo' => $tipo,
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('archivos.index')
            ->with('success', 'Archivo actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nis)
    {
        $archivo = archivos::findOrFail($nis);

        //Borrar el archivo físico del disco 'public'
        if (Storage::disk('public')->exists($archivo->ruta)) {
            Storage::disk('public')->delete($archivo->ruta);
        }                               

        // 3. Borrar el registro de la base de datos
        $archivo->delete();

        //Mensaje
        return redirect()->route('archivos.index')
            ->with('success', 'Archivo y registro eliminados correctamente.');
    }
}
