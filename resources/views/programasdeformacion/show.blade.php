@extends('layouts.app')

@section('title', 'Detalle del Programa')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center py-3">
                <h4 class="mb-0"><i class="bi bi-info-circle me-2"></i>Detalle del Programa</h4>
                <span class="badge bg-light text-dark">NIS: {{ $programasdeformacion->nis }}</span>
            </div>
            
            <div class="card-body p-4">
                @if(isset($programasdeformacion))
                    <div class="row mb-4">
                        <div class="col-sm-4 text-muted fw-bold">Código del Programa:</div>
                        <div class="col-sm-8">
                            <span class="badge bg-secondary fs-6">{{ $programasdeformacion->codigo }}</span>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-sm-4 text-muted fw-bold">Denominación:</div>
                        <div class="col-sm-8 text-uppercase fw-bold text-primary">
                            {{ $programasdeformacion->denominacion }}
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-12">
                            <div class="text-muted fw-bold mb-2">Observaciones:</div>
                            <div class="p-3 bg-light rounded border text-secondary">
                                {{ $programasdeformacion->observaciones ?? 'No hay observaciones registradas para este programa.' }}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-octagon me-2"></i>Error: No se pudo cargar la información del programa.
                    </div>
                @endif
            </div>

            <div class="card-footer bg-white d-flex justify-content-between py-3">
                <a href="{{ route('programasdeformacion.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Volver a la lista
                </a>
                <a href="{{ route('programasdeformacion.edit', $programasdeformacion->nis) }}" class="btn btn-warning shadow-sm">
                    <i class="bi bi-pencil-square"></i> Editar Información
                </a>
            </div>
        </div>
    </div>
</div>
@endsection