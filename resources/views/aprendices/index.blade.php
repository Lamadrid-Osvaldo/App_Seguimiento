@extends('layouts.app')

@section('title', 'Lista de Aprendices')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="text-primary fw-bold mb-0">Gestión de Aprendices</h2>
            <p class="text-muted small">Listado general de estudiantes registrados en el sistema</p>
        </div>
        <a href="{{ route('aprendices.create') }}" class="btn btn-success shadow-sm">
            <i class="bi bi-person-plus-fill"></i> Nuevo Aprendiz
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
                            <th class="ps-4">Documento</th>
                            <th>Nombre Completo</th>
                            <th>Contacto</th>
                            <th>Correo Institucional</th>
                            <th class="text-center">Sexo</th>
                            <th>EPS / Ficha</th>
                            <th class="text-center" style="width: 220px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($aprendices as $aprendiz)
                        <tr>
                            <td class="ps-4">
                                <small class="text-muted d-block">{{ $aprendiz->tiposdocumentos->denominacion }}</small>
                                <span class="fw-bold">{{ $aprendiz->numdoc }}</span>
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $aprendiz->nombres }}</div>
                                <div class="small text-muted text-uppercase">{{ $aprendiz->apellidos }}</div>
                            </td>
                            <td>
                                <div class="small"><i class="bi bi-telephone me-1"></i>{{ $aprendiz->telefono }}</div>
                                <div class="small text-muted"><i class="bi bi-geo-alt me-1"></i>{{ $aprendiz->direccion }}</div>
                            </td>
                            <td>
                                <a href="mailto:{{ $aprendiz->correoinstitucional }}" class="text-decoration-none small">
                                    {{ $aprendiz->correoinstitucional }}
                                </a>
                            </td>
                            <td class="text-center">
                                @if($aprendiz->sexo == 1)
                                    <span class="badge rounded-pill bg-info bg-opacity-10 text-info border border-info border-opacity-25 px-3">Hombre</span>
                                @else
                                    <span class="badge rounded-pill bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-3">Mujer</span>
                                @endif
                            </td>
                            <td>
                                <div class="small"><strong>EPS:</strong> {{ $aprendiz->eps->denominacion }}</div>
                                <div class="small text-primary"><strong>Ficha:</strong> {{ $aprendiz->fichasdecaracterizacion->denominacion }}</div>
                            </td>
                            <td class="text-center pe-4">
                                <div class="btn-group btn-group-sm shadow-sm" role="group">
                                    <a href="{{ route('aprendices.show', $aprendiz->nis) }}" 
                                       class="btn btn-outline-info" title="Ver detalle">
                                        <i class="bi bi-eye"></i> Ver
                                    </a>
                                    
                                    <a href="{{ route('aprendices.edit', $aprendiz->nis) }}" 
                                       class="btn btn-outline-warning" title="Editar">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>

                                    <form action="{{ route('aprendices.destroy', $aprendiz->nis) }}" 
                                          method="POST" class="d-inline form-eliminar">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger btn-borrar" 
                                                title="Eliminar">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="bi bi-people display-4 d-block mb-2"></i>
                                No hay aprendices registrados en la base de datos.
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