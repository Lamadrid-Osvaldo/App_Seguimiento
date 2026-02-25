@extends('layouts.app')

@section('title', 'Perfil del Aprendiz')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-info text-white py-3 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="bi bi-person-badge me-2"></i>Detalles del Aprendiz
                    </h4>
                    <span class="badge bg-light text-dark px-3">NIS: {{ $aprendices->nis }}</span>
                </div>

                <div class="card-body p-4">
                    <div class="row align-items-center mb-4">
                        <div class="col-auto">
                            <div class="bg-light rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <i class="bi bi-person-fill display-4 text-info"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h2 class="fw-bold text-dark mb-0">{{ $aprendices->nombres }} {{ $aprendices->apellidos }}</h2>
                            <p class="text-muted mb-0">
                                <span class="badge bg-secondary">{{ $aprendices->tiposdocumentos?->denominacion }}</span> 
                                {{ $aprendices->numdoc }}
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 border-end">
                            <h5 class="text-primary border-bottom pb-2 mb-3 small fw-bold text-uppercase">Información Personal</h5>
                            <dl class="row small">
                                <dt class="col-sm-5 text-muted">Sexo:</dt>
                                <dd class="col-sm-7 fw-bold">{{ $aprendices->sexo == 1 ? 'Hombre' : 'Mujer' }}</dd>

                                <dt class="col-sm-5 text-muted">Fecha Nacimiento:</dt>
                                <dd class="col-sm-7">{{ $aprendices->fechanac ? \Carbon\Carbon::parse($aprendices->fechanac)->format('d/m/Y') : 'No asignada' }}</dd>

                                <dt class="col-sm-5 text-muted">Dirección:</dt>
                                <dd class="col-sm-7">{{ $aprendices->direccion }}</dd>

                                <dt class="col-sm-5 text-muted">Teléfono:</dt>
                                <dd class="col-sm-7 text-primary fw-bold">{{ $aprendices->telefono }}</dd>
                            </dl>
                        </div>

                        <div class="col-md-6 ps-md-4">
                            <h5 class="text-primary border-bottom pb-2 mb-3 small fw-bold text-uppercase">Vínculo Institucional</h5>
                            <dl class="row small">
                                <dt class="col-sm-5 text-muted">Correo Inst.:</dt>
                                <dd class="col-sm-7 text-truncate">
                                    <a href="mailto:{{ $aprendices->correoinstitucional }}">{{ $aprendices->correoinstitucional }}</a>
                                </dd>

                                <dt class="col-sm-5 text-muted">Correo Pers.:</dt>
                                <dd class="col-sm-7 text-truncate">{{ $aprendices->correopersonal }}</dd>

                                <dt class="col-sm-5 text-muted">EPS:</dt>
                                <dd class="col-sm-7 text-danger fw-bold">{{ $aprendices->eps?->denominacion ?? 'No asignada' }}</dd>

                                <dt class="col-sm-5 text-muted">Ficha:</dt>
                                <dd class="col-sm-7">
                                    <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 w-100">
                                        {{ $aprendices->fichasdecaracterizacion?->denominacion ?? 'No asignada' }}
                                    </span>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-white py-3 border-top">
                    <div class="d-flex justify-content-start gap-2">
                        <a href="{{ route('aprendices.index') }}" class="btn btn-secondary shadow-sm">
                            <i class="bi bi-arrow-left"></i> Volver
                        </a>
                        
                        <a href="{{ route('aprendices.edit', $aprendices->nis) }}" class="btn btn-warning shadow-sm">
                            <i class="bi bi-pencil-square"></i> Editar Perfil
                        </a>

                        <form action="{{ route('aprendices.destroy', $aprendices->nis) }}" 
                              method="POST" class="d-inline form-eliminar">
                            @csrf
                            @method('DELETE')
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