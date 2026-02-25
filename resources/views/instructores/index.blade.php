@extends('layouts.app')

@section('title', 'Lista de Instructores')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-dark fw-bold">
        <i class="bi bi-person-badge-fill text-success me-2"></i>Lista de Instructores
    </h2>
    <a href="{{ route('instructores.create') }}" class="btn btn-success shadow-sm">
        <i class="bi bi-plus-circle me-1"></i> Nuevo Instructor
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">NIS</th>
                        <th>Documento</th>
                        <th>Nombre Completo</th>
                        <th>Contacto</th>
                        <th>Correos</th>
                        <th>Sexo</th>
                        <th>Rol Admin</th>
                        <th class="text-center pe-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($instructores as $instructor)
                    <tr>
                        <td class="ps-4 fw-bold text-muted">{{ $instructor->nis }}</td>
                        <td>
                            <span class="badge bg-light text-dark border">{{ $instructor->tiposdocumentos?->denominacion }}</span><br>
                            <small class="fw-bold">{{ $instructor->numdoc }}</small>
                        </td>
                        <td>
                            <div class="fw-bold">{{ $instructor->nombres }}</div>
                            <div class="text-muted small">{{ $instructor->apellidos }}</div>
                        </td>
                        <td class="small">
                            <i class="bi bi-telephone me-1"></i> {{ $instructor->telefono }}<br>
                            <i class="bi bi-geo-alt me-1"></i> {{ Str::limit($instructor->direccion, 20) }}
                        </td>
                        <td class="small">
                            <span class="text-primary">{{ $instructor->correoinstitucional }}</span><br>
                            <span class="text-muted">{{ $instructor->correopersonal }}</span>
                        </td>
                        <td>
                            @if($instructor->sexo == 1)
                                <span class="badge rounded-pill bg-info text-dark">M</span>
                            @else
                                <span class="badge rounded-pill bg-warning text-dark">F</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25">
                                {{ $instructor->rolesadministrativos?->descripcion ?? 'Sin Rol' }}
                            </span>
                        </td>
                        <td class="text-center pe-4">
                            <div class="btn-group shadow-sm">
                                <a href="{{ route('instructores.show', $instructor->nis) }}" class="btn btn-sm btn-outline-info" title="Ver detalles">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('instructores.edit', $instructor->nis) }}" class="btn btn-sm btn-outline-warning" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('instructores.destroy', $instructor->nis) }}" method="POST" class="d-inline form-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger btn-borrar" title="Eliminar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="bi bi-person-exclamation display-4"></i>
                            <p class="mt-2">No hay instructores registrados en el sistema.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection