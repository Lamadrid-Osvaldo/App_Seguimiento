@extends('layouts.app')

@section('title', 'Gestión de Archivos')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm border-primary mb-4">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0"><i class="bi bi-cloud-arrow-up-fill me-2"></i>Subir Documento</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('archivos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="archivo_file" class="form-label small fw-bold text-muted">Seleccione un archivo (PDF, JPG, PNG, DOCX)</label>
                            <input type="file" name="archivo_file" id="archivo_file" class="form-control" required>
                            <div class="form-text mt-1">Tamaño máximo: 5MB.</div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success fw-bold shadow-sm">
                                <i class="bi bi-upload me-1"></i> Cargar al Servidor
                            </button>
                        </div>
                    </form>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger mt-3 py-2 small">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card bg-light border-0 shadow-sm d-none d-md-block text-center p-3">
                <div class="card-body">
                    <i class="bi bi-shield-check text-primary display-6 mb-2"></i>
                    <p class="small text-muted mb-0">Los archivos se almacenan de forma segura en el almacenamiento del sistema.</p>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="mb-0 fw-bold text-dark">
                        <i class="bi bi-folder2-open me-2 text-warning"></i>Repositorio de Archivos
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Nombre Original</th>
                                    <th>Extensión</th>
                                    <th>Fecha</th>
                                    <th class="text-end pe-4">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($archivos as $archivo)
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-file-earmark-text text-primary fs-4 me-2"></i>
                                            <div class="fw-bold text-dark text-truncate" style="max-width: 280px;" title="{{ $archivo->nombre_original }}">
                                                {{ $archivo->nombre_original }}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge rounded-pill bg-light text-dark border text-uppercase">{{ $archivo->tipo }}</span>
                                    </td>
                                    <td class="small text-muted">
                                        {{ $archivo->created_at ? $archivo->created_at->format('d/m/Y') : 'N/A' }}
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="btn-group gap-1">
                                            <a href="{{ asset( 'storage/' . $archivo->ruta) }}" target="_blank" class="btn btn-sm btn-outline-primary" title="Ver Archivo">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                            
                                            <form action="{{ route('archivos.destroy', $archivo->nis) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este archivo?')">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5">
                                        <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" width="60" class="opacity-25 mb-3">
                                        <p class="text-muted fw-bold">No hay archivos registrados actualmente.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection