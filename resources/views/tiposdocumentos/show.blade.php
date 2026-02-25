@extends('layouts.app')

@section('title', 'Detalle del Tipo de Documento')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Detalle del Tipo de Documento</h4>
                <span class="badge bg-light text-dark">NIS: {{ $tiposdocumentos->nis }}</span>
            </div>
            
            <div class="card-body">
                @if(isset($tiposdocumentos))
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <span class="fw-bold">Denominación:</span>
                            <span class="text-uppercase fw-bold text-primary">{{ $tiposdocumentos->denominacion }}</span>
                        </li>
                        
                        <li class="list-group-item py-3">
                            <div class="fw-bold mb-2">Observaciones:</div>
                            <div class="p-3 bg-light rounded border text-muted">
                                {{ $tiposdocumentos->observaciones ?? 'Sin observaciones registradas.' }}
                            </div>
                        </li>
                    </ul>
                @else
                    <div class="alert alert-warning m-3">
                        <i class="bi bi-exclamation-triangle"></i> No se encontró la información del registro.
                    </div>
                @endif
            </div>

            <div class="card-footer bg-transparent d-flex justify-content-between py-3">
                <a href="{{ route('tiposdocumentos.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Volver a la lista
                </a>
                <a href="{{ route('tiposdocumentos.edit', $tiposdocumentos->nis) }}" class="btn btn-warning">
                    <i class="bi bi-pencil-square"></i> Editar Registro
                </a>
            </div>
        </div>
    </div>
</div>
@endsection