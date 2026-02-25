@extends('layouts.app')

@section('title', 'Detalle de la Regional')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-info text-white py-3 d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="bi bi-geo-alt me-2"></i>Información de la Regional</h4>
                <span class="badge bg-light text-dark">NIS: {{ $regionales->nis }}</span>
            </div>
            
            <div class="card-body p-4">
                @if(isset($regionales))
                    <div class="row mb-3 border-bottom pb-2">
                        <div class="col-sm-4 text-muted fw-bold">Código Regional:</div>
                        <div class="col-sm-8">
                            <span class="badge bg-secondary fs-6">{{ $regionales->codigo }}</span>
                        </div>
                    </div>

                    <div class="row mb-3 border-bottom pb-2">
                        <div class="col-sm-4 text-muted fw-bold">Nombre / Denominación:</div>
                        <div class="col-sm-8 text-uppercase fw-bold text-primary">
                            {{ $regionales->denominacion }}
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-12">
                            <div class="text-muted fw-bold mb-2">Observaciones:</div>
                            <div class="p-3 bg-light rounded border">
                                {{ $regionales->observaciones ?? 'No se han registrado observaciones para esta regional.' }}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle me-2"></i> No se encontró la información del registro solicitado.
                    </div>
                @endif
            </div>

            <div class="card-footer bg-white d-flex justify-content-between py-3">
                <a href="{{ route('regionales.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Volver a la lista
                </a>
                <a href="{{ route('regionales.edit', $regionales->nis) }}" class="btn btn-warning shadow-sm">
                    <i class="bi bi-pencil-square"></i> Editar Regional
                </a>
            </div>
        </div>
    </div>
</div>
@endsection