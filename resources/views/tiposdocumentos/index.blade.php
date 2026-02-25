@extends('layouts.app')

@section('title', 'Tipos de Documentos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-primary">Tipos de Documentos</h2>
    <a href="{{ route('tiposdocumentos.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Nuevo Tipo
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">NIS</th>
                        <th>Denominación</th>
                        <th>Observaciones</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tiposdocumentos as $item)
                    <tr>
                        <td class="px-4">{{ $item->nis }}</td>
                        <td class="fw-bold">{{ $item->denominacion }}</td>
                        <td>{{ $item->observaciones ?? 'N/A' }}</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('tiposdocumentos.show', $item->nis) }}" class="btn btn-outline-info">
                                    <i class="bi bi-eye"></i> Ver
                                </a>
                                <a href="{{ route('tiposdocumentos.edit', $item->nis) }}" class="btn btn-outline-warning">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <form action="{{ route('tiposdocumentos.destroy', $item->nis) }}" method="POST" class="d-inline form-eliminar">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-outline-danger btn-borrar" title="Eliminar">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">No hay registros disponibles.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection