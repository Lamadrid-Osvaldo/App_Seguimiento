@extends('layouts.app')

@section('title', 'Lista de Regionales')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="text-primary fw-bold mb-0">Gestión de Regionales</h2>
        <p class="text-muted small">Administración de regionales SENA</p>
    </div>
    <a href="{{ route('regionales.create') }}" class="btn btn-success shadow-sm">
        <i class="bi bi-geo-alt-fill"></i> Nueva Regional
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">NIS</th>
                        <th>Código</th>
                        <th>Denominación</th>
                        <th>Observaciones</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($regionales as $item)
                    <tr>
                        <td class="px-4 text-muted small">{{ $item->nis }}</td>
                        <td><span class="badge bg-secondary opacity-75">{{ $item->codigo }}</span></td>
                        <td class="fw-bold">{{ $item->denominacion }}</td>
                        <td class="text-secondary small">
                            {{ Str::limit($item->observaciones, 40, '...') ?? 'N/A' }}
                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('regionales.show', $item->nis) }}" 
                                   class="btn btn-outline-info" title="Ver detalle">
                                    <i class="bi bi-eye"></i> Ver
                                </a>

                                <a href="{{ route('regionales.edit', $item->nis) }}" 
                                   class="btn btn-outline-warning" title="Editar">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>

                                <form action="{{ route('regionales.destroy', $item->nis) }}" 
                                      method="POST" class="d-inline form-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-outline-danger btn-borrar" 
                                            title="Eliminar regional">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <i class="bi bi-geo text-muted display-4"></i>
                            <p class="mt-2 text-muted">No hay regionales registradas en el sistema.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection