@extends('layouts.app')

@section('title', 'Listado de EPS')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">Listado de EPS</h2>
        <a href="{{ route('eps.create') }}" class="btn btn-success shadow-sm">
            <i class="bi bi-plus-lg"></i> Nueva EPS
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
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
                            <th>Número</th>
                            <th>Denominación</th>
                            <th>Observaciones</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($eps as $item)
                        <tr>
                            <td class="px-4 text-muted">{{ $item->nis }}</td>
                            <td class="fw-bold">{{ $item->numdoc }}</td>
                            <td>{{ $item->denominacion }}</td>
                            <td>
                                <small class="text-secondary">
                                    {{ Str::limit($item->observaciones, 50, '...') }}
                                </small>
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('eps.show', $item->nis) }}" class="btn btn-outline-info" title="Ver detalle">
                                        Ver
                                    </a>
                                    <a href="{{ route('eps.edit', $item->nis) }}" class="btn btn-outline-warning" title="Editar">
                                        Editar
                                    </a>
                                    <form action="{{ route('eps.destroy', $item->nis) }}" method="POST" class="d-inline form-eliminar">
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
                            <td colspan="5" class="text-center py-4 text-muted">
                                No hay EPS registradas en el sistema.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection