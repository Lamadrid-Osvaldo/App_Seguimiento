@extends('layouts.app')

@section('title', 'Detalle de la Ficha')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-info text-white py-3 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="bi bi-info-circle me-2"></i>Detalle del Registro</h4>
                    <span class="badge bg-light text-dark px-3">NIS: {{ $fichasdecaracterizacion->nis }}</span>
                </div>

                <div class="card-body p-4">
                    @if(isset($fichasdecaracterizacion))
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <h2 class="fw-bold text-primary">{{ $fichasdecaracterizacion->denominacion }}</h2>
                                <p class="text-muted fs-5">Código de Ficha: <strong>{{ $fichasdecaracterizacion->codigo }}</strong></p>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <div class="p-2 bg-light border rounded">
                                    <small class="text-muted d-block fw-bold text-uppercase">Cupo</small>
                                    <span class="display-6 fw-bold">{{ $fichasdecaracterizacion->cupo }}</span>
                                </div>
                            </div>
                        </div>

                        <hr class="opacity-25">

                        <div class="row mb-4 mt-4">
                            <div class="col-md-6 mb-3">
                                <div class="p-3 border-start border-4 border-primary bg-light">
                                    <label class="text-muted small fw-bold text-uppercase d-block">Centro de Formación</label>
                                    <span class="fs-5">{{ $fichasdecaracterizacion->centrosdeformacion->denominacion ?? 'No asignado' }}</span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="p-3 border-start border-4 border-success bg-light">
                                    <label class="text-muted small fw-bold text-uppercase d-block">Programa de Formación</label>
                                    <span class="fs-5">{{ $fichasdecaracterizacion->programasdeformacion->denominacion ?? 'No asignado' }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card border-0 bg-light">
                                    <div class="card-body">
                                        <h6 class="fw-bold border-bottom pb-2 mb-3"><i class="bi bi-calendar3 me-2"></i>Cronograma</h6>
                                        <p class="mb-2"><strong>Fecha de Inicio:</strong> {{ $fichasdecaracterizacion->fechainicio?->format('d/m/Y') ?? 'No asignado' }}</p>
                                        <p class="mb-0"><strong>Fecha de Fin:</strong> {{ $fichasdecaracterizacion->fechafin?->format('d/m/Y') ?? 'No asignado' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold border-bottom pb-2 mb-3"><i class="bi bi-chat-right-text me-2"></i>Observaciones</h6>
                                <p class="text-muted italic">
                                    {{ $fichasdecaracterizacion->observaciones ?? 'Sin observaciones registradas.' }}
                                </p>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-danger text-center">
                            No se encontró la información del registro solicitado.
                        </div>
                    @endif
                </div>

                <div class="card-footer bg-white py-3 border-top">
                    <div class="d-flex justify-content-start gap-2">
                        <a href="{{ route('fichasdecaracterizacion.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Volver a la lista
                        </a>
                        <a href="{{ route('fichasdecaracterizacion.edit', $fichasdecaracterizacion->nis) }}" class="btn btn-warning px-4">
                            <i class="bi bi-pencil-square"></i> Editar
                        </a>
                        <form action="{{ route('fichasdecaracterizacion.destroy', $fichasdecaracterizacion->nis) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger px-4" onclick="return confirm('¿Estás seguro de eliminar esta ficha?')">
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