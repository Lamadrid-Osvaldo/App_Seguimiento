@extends('layouts.app')

@section('title', 'Detalle de EPS')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Información de la EPS</h4>
                <span class="badge bg-light text-dark">ID: {{ $eps->nis }}</span>
            </div>
            
            <div class="card-body">
                @if(isset($eps))
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Número de Documento / NIT:</span>
                            <span>{{ $eps->numdoc }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Denominación:</span>
                            <span class="text-uppercase text-primary fw-bold">{{ $eps->denominacion }}</span>
                        </li>
                        <li class="list-group-item">
                            <div class="fw-bold mb-2">Observaciones:</div>
                            <div class="p-3 bg-light rounded border">
                                {{ $eps->observaciones ?? 'Sin observaciones registradas.' }}
                            </div>
                        </li>
                    </ul>
                @else
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle"></i> No se encontró la información del registro.
                    </div>
                @endif
            </div>

            <div class="card-footer bg-transparent d-flex justify-content-between">
                <a href="{{ route('eps.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Volver a la lista
                </a>
                <div>
                    <a href="{{ route('eps.edit', $eps->nis) }}" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i> Editar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection