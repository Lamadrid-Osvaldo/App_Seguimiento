@extends('layouts.app')

@section('title', 'Lista de Usuarios')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark m-0">
                <i class="bi bi-people-fill text-primary me-2"></i>Usuarios del Sistema
            </h2>
            <p class="text-muted small">Administra quiénes tienen acceso a la plataforma SGEP</p>
        </div>
        <a href="{{ route('usuarios.create') }}" class="btn btn-success shadow-sm px-4">
            <i class="bi bi-person-plus-fill me-2"></i>Registrar Nuevo
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-uppercase">
                        <tr>
                            <th class="ps-4 py-3 text-secondary small fw-bold" style="width: 80px;">NIS</th>
                            <th class="py-3 text-secondary small fw-bold">Nombre Completo</th>
                            <th class="py-3 text-secondary small fw-bold">Correo Electrónico</th>
                            <th class="py-3 text-secondary small fw-bold text-center">Contraseña</th>
                            <th class="py-3 text-secondary small fw-bold text-center">Fecha Registro</th>
                            <th class="py-3 text-secondary small fw-bold text-center">Última Actualización</th>
                            <th class="pe-4 py-3 text-secondary small fw-bold text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($usuarios as $user)
                        <tr>
                            <td class="ps-4">
                                <span class="badge bg-secondary-subtle text-secondary border">#{{ $user->nis }}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px; font-weight: bold;">
                                        {{ strtoupper(substr($user->nombre, 0, 1)) }}
                                    </div>
                                    <span class="fw-bold">{{ $user->nombre }}</span>
                                </div>
                            </td>
                            <td>
                                <a href="mailto:{{ $user->email }}" class="text-decoration-none text-muted">
                                    <i class="bi bi-envelope-at-fill me-1 text-primary"></i> {{ $user->email }}
                                </a>
                            </td>
                            <td>
                                <div style="max-width: 350px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    <code class="text-danger fw-bold" title="{{ $user->contrasena }}">
                                        {{ $user->contrasena }}
                                    </code>
                                </div>
                            </td>
                            <td class="text-center text-muted small">
                                {{ $user->created_at ? $user->created_at->format('d/m/Y') : 'N/A' }}
                            </td>
                            <td class="text-center text-muted small">
                                {{ $user->updated_at ? $user->updated_at->format('d/m/Y') : 'N/A' }}
                            </td>
                            <td class="pe-4 text-end">
                                <div class="btn-group shadow-sm">
                                    <a href="{{ route('usuarios.edit', ['usuario' => $user->nis]) }}" 
                                    class="btn btn-sm border-0 px-3" 
                                    style="background-color: #e7f1ff; color: #0d6efd; font-weight: 600;">
                                        <i class="bi bi-pencil-square"></i> Editar
                                    </a>
                                    <form action="{{ route('usuarios.destroy', $user->nis) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash-fill"></i> Eliminar
                                        </button>
                                    </form>

                                    
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <i class="bi bi-person-exclamation fs-1 text-muted"></i>
                                <p class="mt-2 text-muted">No hay usuarios registrados todavía.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-between align-items-center mt-4 px-3">
    <div class="text-muted small">
        Mostrando {{ $usuarios->firstItem() }} a {{ $usuarios->lastItem() }} de {{ $usuarios->total() }} usuarios
    </div>
    <nav aria-label="Navegación de usuarios">
        {{ $usuarios->links('pagination::bootstrap-5') }}
    </nav>
</div>

</div>


@endsection