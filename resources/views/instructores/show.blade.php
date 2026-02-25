@extends('layouts.app')

@section('title', 'Detalles del Instructor')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-info">
                <div class="card-header bg-info text-white py-3">
                    <h4 class="mb-0">
                        <i class="bi bi-eye-fill me-2"></i>Detalles del Instructor: {{ $instructores->nombres }} {{ $instructores->apellidos }}
                    </h4>
                </div>

                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-6 border-end pe-md-4">
                            <h5 class="text-primary mb-3 small fw-bold text-uppercase border-bottom pb-2">Identificación Personal</h5>
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <th class="text-muted small" style="width: 40%;">NIS</th>
                                    <td class="fw-bold">{{ $instructores->nis }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted small">Tipo Documento</th>
                                    <td>{{ $instructores->tiposdocumentos?->denominacion ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted small">Número Doc.</th>
                                    <td>{{ $instructores->numdoc }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted small">Sexo</th>
                                    <td>{{ $instructores->sexo == 1 ? 'Hombre' : 'Mujer' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted small">Fecha Nac.</th>
                                    <td>{{ $instructores->fechanac ? \Carbon\Carbon::parse($instructores->fechanac)->format('d/m/Y') : 'No asignada' }}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-md-6 ps-md-4">
                            <h5 class="text-primary mb-3 small fw-bold text-uppercase border-bottom pb-2">Contacto y Rol</h5>
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <th class="text-muted small" style="width: 40%;">Dirección</th>
                                    <td>{{ $instructores->direccion }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted small">Teléfono</th>
                                    <td>{{ $instructores->telefono }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted small">Correo Inst.</th>
                                    <td class="text-primary">{{ $instructores->correoinstitucional }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted small">EPS</th>
                                    <td>{{ $instructores->eps?->denominacion ?? 'No asignada' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted small text-danger">Rol Admin.</th>
                                    <td>
                                        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25">
                                            {{ $instructores->rolesadministrativos?->descripcion ?? 'Sin Rol Asignado' }}
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                        <a href="{{ route('instructores.index') }}" class="btn btn-secondary px-4">
                            <i class="bi bi-arrow-left me-1"></i> Volver
                        </a>
                        <a href="{{ route('instructores.edit', $instructores->nis) }}" class="btn btn-warning px-4 text-dark">
                            <i class="bi bi-pencil-square me-1"></i> Editar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection