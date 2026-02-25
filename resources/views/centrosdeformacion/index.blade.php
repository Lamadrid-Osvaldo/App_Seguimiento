@extends('layouts.app')

@section('title', 'Lista de Centros de Formación')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="text-primary fw-bold mb-0">Centros de Formación</h2>
            <p class="text-muted small">Administración de sedes y regionales vinculadas</p>
        </div>
        <a href="{{ route('centrosdeformacion.create') }}" class="btn btn-success shadow-sm">
            <i class="bi bi-house-add"></i> Nuevo Centro de Formación
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4" style="width: 80px;">NIS</th>
                            <th style="width: 100px;">Código</th>
                            <th>Denominación</th>
                            <th>Dirección</th>
                            <th>Observaciones</th> {{-- Columna agregada --}}
                            <th>Regional</th>
                            <th class="text-center" style="width: 250px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($centrosdeformacion as $centro)
                        <tr>
                            <td class="ps-4 text-muted small">{{ $centro->nis }}</td>
                            <td>
                                <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25 px-2 py-1">
                                    {{ $centro->codigo }}
                                </span>
                            </td>
                            <td class="fw-bold text-dark">{{ $centro->denominacion }}</td>
                            <td class="small text-muted">
                                <i class="bi bi-geo-alt me-1"></i>{{ $centro->direccion }}
                            </td>
                            {{-- Celda de Observaciones con texto truncado si es muy largo --}}
                            <td class="small text-muted" style="max-width: 200px;">
                                <span class="text-truncate d-inline-block w-100" title="{{ $centro->observaciones }}">
                                    {{ $centro->observaciones ?: 'Sin observaciones' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge rounded-pill bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3">
                                    {{ $centro->regional->denominacion ?? 'No asignado' }}
                                </span>
                            </td>
                            <td class="text-center pe-4">
                                <div class="btn-group btn-group-sm shadow-sm" role="group">
                                    <a href="{{ route('centrosdeformacion.show', $centro->nis) }}" 
                                       class="btn btn-outline-info" title="Ver detalle">
                                        <i class="bi bi-eye"></i> Ver
                                    </a>
                                    
                                    <a href="{{ route('centrosdeformacion.edit', $centro->nis) }}" 
                                       class="btn btn-outline-warning" title="Editar">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>

                                    <form action="{{ route('centrosdeformacion.destroy', $centro->nis) }}" 
                                method="POST" class="d-inline form-eliminar"> {{-- Agregamos la clase form-eliminar --}}
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger btn-borrar" title="Eliminar">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                                </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted"> {{-- Colspan actualizado a 7 --}}
                                <i class="bi bi-building-exclamation display-4 d-block mb-2"></i>
                                No hay centros de formación registrados.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection