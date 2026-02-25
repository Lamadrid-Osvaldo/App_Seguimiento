@extends('layouts.app')

@section('title', 'Detalle del Ente Coformador')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-info text-white py-3 d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="bi bi-building me-2"></i>Ficha del Ente Coformador</h4>
                <span class="badge bg-light text-dark px-3">NIS: {{ $entecoformadores->nis }}</span>
            </div>
            
            <div class="card-body p-4">
                @if(isset($entecoformadores))
                    <div class="row mb-4">
                        <div class="col-md-6 border-end">
                            <h5 class="text-muted border-bottom pb-2 mb-3">Información de Identificación</h5>
                            
                            <div class="mb-3">
                                <small class="text-muted d-block fw-bold">Tipo de Documento:</small>
                                <span class="fs-5">{{ $entecoformadores->tdoc }}</span>
                            </div>
                            
                            <div class="mb-3">
                                <small class="text-muted d-block fw-bold">Número de Documento:</small>
                                <span class="fs-5 fw-bold text-dark">{{ $entecoformadores->numdoc }}</span>
                            </div>

                            <div class="mb-3">
                                <small class="text-muted d-block fw-bold">Razón Social / Nombre:</small>
                                <span class="fs-4 fw-bold text-primary">{{ $entecoformadores->razonsocial }}</span>
                            </div>
                        </div>

                        <div class="col-md-6 ps-md-4">
                            <h5 class="text-muted border-bottom pb-2 mb-3">Datos de Contacto</h5>
                            
                            <div class="mb-3">
                                <small class="text-muted d-block fw-bold">Dirección Física:</small>
                                <span><i class="bi bi-geo-alt me-2 text-info"></i>{{ $entecoformadores->direccion }}</span>
                            </div>

                            <div class="mb-3">
                                <small class="text-muted d-block fw-bold">Teléfono de Contacto:</small>
                                <span><i class="bi bi-telephone me-2 text-info"></i>{{ $entecoformadores->telefono }}</span>
                            </div>

                            <div class="mb-3">
                                <small class="text-muted d-block fw-bold">Correo Institucional:</small>
                                <a href="mailto:{{ $entecoformadores->correoinstitucional }}" class="text-decoration-none">
                                    <i class="bi bi-envelope me-2 text-info"></i>{{ $entecoformadores->correoinstitucional }}
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning text-center">
                        <i class="bi bi-exclamation-triangle fs-1 d-block mb-2"></i>
                        No se encontró la información detallada de este registro.
                    </div>
                @endif
            </div>

            <div class="card-footer bg-white d-flex justify-content-between py-3 border-top">
                <a href="{{ route('entecoformadores.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Volver a la lista
                </a>
                <a href="{{ route('entecoformadores.edit', $entecoformadores->nis) }}" class="btn btn-warning shadow-sm">
                    <i class="bi bi-pencil-square"></i> Editar Información
                </a>
            </div>
        </div>
    </div>
</div>
@endsection