@extends('layouts.app')

@section('title', 'Lista de Ente Coformadores')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="text-primary fw-bold mb-0">Ente Coformadores</h2>
    </div>
    <a href="{{ route('entecoformadores.create') }}" class="btn btn-success shadow-sm">
        <i class="bi bi-building-plus"></i> Registrar Ente
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
                        <th>Tipo Doc</th>
                        <th>Número Doc</th>
                        <th>Razón Social</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($entecoformadores as $item)
                    <tr>
                        <td class="px-4 text-muted small">{{ $item->nis }}</td>
                        <td>{{ $item->tdoc }}</td>
                        <td class="fw-bold">{{ $item->numdoc }}</td>
                        <td class="text-primary fw-bold">{{ $item->razonsocial }}</td>
                        <td class="small">{{ $item->direccion }}</td>
                        <td>{{ $item->telefono }}</td>
                        <td class="small">{{ $item->correoinstitucional }}</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('entecoformadores.show', $item->nis) }}" 
                                   class="btn btn-outline-info" title="Ver detalle">
                                    <i class="bi bi-eye"></i> Ver
                                </a>

                                <a href="{{ route('entecoformadores.edit', $item->nis) }}" 
                                   class="btn btn-outline-warning" title="Editar">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>

                                <form action="{{ route('entecoformadores.destroy', $item->nis) }}" 
                                      method="POST" class="d-inline form-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-outline-danger btn-borrar" 
                                            title="Eliminar registro">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            No hay registros disponibles.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection