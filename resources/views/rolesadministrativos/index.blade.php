@extends('layouts.app')

@section('title', 'Roles Administrativos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="text-primary fw-bold mb-0">Roles Administrativos</h2>
        <p class="text-muted small">Gestión de permisos y cargos del personal</p>
    </div>
    <a href="{{ route('rolesadministrativos.create') }}" class="btn btn-success shadow-sm">
        <i class="bi bi-person-badge-fill"></i> Nuevo Rol
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
                        <th class="px-4" style="width: 15%">NIS</th>
                        <th style="width: 55%">Descripción del Rol</th>
                        <th class="text-center" style="width: 30%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rolesadministrativos as $rol)
                    <tr>
                        <td class="px-4 text-muted small">{{ $rol->nis }}</td>
                        <td>
                            <span class="fw-bold text-dark">{{ $rol->descripcion }}</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('rolesadministrativos.show', $rol->nis) }}" 
                                   class="btn btn-outline-info" title="Ver detalle">
                                    <i class="bi bi-eye"></i> Ver
                                </a>

                                <a href="{{ route('rolesadministrativos.edit', $rol->nis) }}" 
                                   class="btn btn-outline-warning" title="Editar">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>

                                <form action="{{ route('rolesadministrativos.destroy', $rol->nis) }}" 
                                      method="POST" class="d-inline form-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-outline-danger btn-borrar" 
                                            title="Eliminar rol">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center py-5">
                            <i class="bi bi-shield-lock text-muted display-4"></i>
                            <p class="mt-2 text-muted">No se han definido roles administrativos aún.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection