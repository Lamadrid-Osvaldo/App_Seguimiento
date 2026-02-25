@extends('layouts.app')

@section('title', 'Inicio - Panel de Control')

@section('content')
<div class="container-fluid py-2">
    <div class="row mb-4">
        <div class="col-12">
            <div class="p-5 mb-4 bg-light rounded-3 shadow-sm border-start border-success border-5">
                <div class="container-fluid py-2">
                    <h1 class="display-5 fw-bold text-dark">Sistema de Gestión de Etapa Productiva</h1>
                    <p class="col-md-8 fs-4 text-muted">Bienvenido al panel administrativo. Desde aquí puedes gestionar aprendices, instructores y toda la oferta académica del centro.</p>
                    <hr class="my-4">
                    <p>Hoy es {{ \Carbon\Carbon::now()->isoFormat('LL') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="bg-success bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                        <i class="bi bi-people text-success fs-1"></i>
                    </div>
                    <h5 class="card-title fw-bold">Aprendices</h5>
                    <p class="card-text text-muted small">Registro y seguimiento de aprendices en formación.</p>
                    <a href="{{ route('aprendices.index') }}" class="btn btn-outline-success w-100">Ir a Lista</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                        <i class="bi bi-person-badge text-primary fs-1"></i>
                    </div>
                    <h5 class="card-title fw-bold">Instructores</h5>
                    <p class="card-text text-muted small">Gestión de planta docente y roles administrativos.</p>
                    <a href="{{ route('instructores.index') }}" class="btn btn-outline-primary w-100">Ir a Lista</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="bg-warning bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                        <i class="bi bi-hash text-warning fs-1"></i>
                    </div>
                    <h5 class="card-title fw-bold">Fichas</h5>
                    <p class="card-text text-muted small">Grupos y programas de formación activos.</p>
                    <a href="{{ route('fichasdecaracterizacion.index') }}" class="btn btn-outline-warning w-100">Ver Fichas</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="bg-info bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                        <i class="bi bi-briefcase text-info fs-1"></i>
                    </div>
                    <h5 class="card-title fw-bold">Coformadores</h5>
                    <p class="card-text text-muted small">Empresas y entes vinculados a la etapa productiva.</p>
                    <a href="{{ route('entecoformadores.index') }}" class="btn btn-outline-info w-100">Ver Entes</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-bold py-3">
                    <i class="bi bi-gear-fill me-2"></i>Configuración del Sistema
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('centrosdeformacion.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-building me-2"></i> Centros de Formación</span>
                            <i class="bi bi-chevron-right"></i>
                        </a>
                        <a href="{{ route('regionales.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-map me-2"></i> Regionales</span>
                            <i class="bi bi-chevron-right"></i>
                        </a>
                        <a href="{{ route('eps.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-hospital me-2"></i> Listado de EPS</span>
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card bg-success text-white border-0 shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-center text-center">
                    <i class="bi bi-info-circle fs-1 mb-3"></i>
                    <h4>Ayuda Rápida</h4>
                    <p class="small">Si tienes problemas con el sistema, contacta al administrador del centro de formación.</p>
                    <button class="btn btn-light btn-sm mt-2">Soporte Técnico</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection