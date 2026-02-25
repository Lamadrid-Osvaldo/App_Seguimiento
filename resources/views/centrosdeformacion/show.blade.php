@extends('layouts.app')

@section('title', 'Detalle del Centro')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-info text-white py-3 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="bi bi-info-circle me-2"></i>Detalle del Centro de Formación</h4>
                    <span class="badge bg-light text-dark px-3">NIS: {{ $centrosdeformacion->nis }}</span>
                </div>

                <div class="card-body p-4">
                    @if(isset($centrosdeformacion))
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <h2 class="fw-bold text-primary mb-1">{{ $centrosdeformacion->denominacion }}</h2>
                                <p class="text-muted fs-5">Código del Centro: <strong>{{ $centrosdeformacion->codigo }}</strong></p>
                            </div>
                        </div>

                        <hr class="opacity-25">

                        <div class="row mt-4">
                            <div class="col-md-6 mb-4">
                                <h6 class="fw-bold text-uppercase small text-muted mb-3">Ubicación y Dependencia</h6>
                                <div class="p-3 bg-light rounded border-start border-4 border-primary">
                                    <p class="mb-2">
                                        <i class="bi bi-geo-alt text-primary me-2"></i>
                                        <strong>Dirección:</strong> {{ $centrosdeformacion->direccion }}
                                    </p>
                                    <p class="mb-0">
                                        <i class="bi bi-diagram-3 text-primary me-2"></i>
                                        <strong>Regional:</strong> {{ $centrosdeformacion->regional->denominacion ?? 'No asignada' }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <h6 class="fw-bold text-uppercase small text-muted mb-3">Notas Adicionales</h6>
                                <div class="p-3 bg-light rounded border h-100">
                                    <p class="mb-0">
                                        <i class="bi bi-chat-left-text text-info me-2"></i>
                                        {{ $centrosdeformacion->observaciones ?? 'Sin observaciones registradas.' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-warning text-center">
                            <i class="bi bi-exclamation-triangle me-2"></i> No se encontró la información del registro.
                        </div>
                    @endif
                </div>

                <div class="card-footer bg-white py-3 border-top">
                    <div class="d-flex justify-content-start gap-2">
                        <a href="{{ route('centrosdeformacion.index') }}" class="btn btn-secondary shadow-sm">
                            <i class="bi bi-arrow-left"></i> Volver a la lista
                        </a>
                        
                        <a href="{{ route('centrosdeformacion.edit', $centrosdeformacion->nis) }}" class="btn btn-warning shadow-sm">
                            <i class="bi bi-pencil-square"></i> Editar Centro
                        </a>

                        <form action="{{ route('centrosdeformacion.destroy', $centrosdeformacion->nis) }}" 
                        method="POST" 
                        class="d-inline form-eliminar"> {{-- 1. Agregamos la clase que captura el script --}}
                        @csrf
                        @method('DELETE')
                        
                        {{-- 2. Quitamos el onclick y agregamos btn-borrar si tu script lo usa --}}
                        <button type="submit" class="btn btn-danger shadow-sm btn-borrar">
                            <i class="bi bi-trash"></i> Eliminar
                        </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection