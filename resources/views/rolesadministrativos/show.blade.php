@extends('layouts.app')

@section('title', 'Detalle del Rol')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-info text-white py-3 d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="bi bi-shield-lock me-2"></i>Detalle del Rol</h4>
                <span class="badge bg-light text-dark px-3">NIS: {{ $rolesadministrativos->nis }}</span>
            </div>
            
            <div class="card-body p-4 text-center">
                @if(isset($rolesadministrativos))
                    <div class="mb-2 text-muted small text-uppercase fw-bold">Descripción del Cargo</div>
                    <h3 class="text-primary mb-4">
                        {{ $rolesadministrativos->descripcion ?? 'Sin descripción asignada' }}
                    </h3>
                    
                    <div class="p-3 bg-light rounded border border-dashed">
                        <p class="mb-0 text-muted">
                            <i class="bi bi-info-circle me-1"></i> 
                            Este rol administrativo permite definir las funciones y alcances dentro del sistema.
                        </p>
                    </div>
                @else
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-octagon me-2"></i> No se encontró el registro del rol.
                    </div>
                @endif
            </div>

            <div class="card-footer bg-white d-flex justify-content-between py-3 border-top-0">
                <a href="{{ route('rolesadministrativos.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Volver a la lista
                </a>
                <a href="{{ route('rolesadministrativos.edit', $rolesadministrativos->nis) }}" class="btn btn-warning shadow-sm">
                    <i class="bi bi-pencil-square"></i> Editar Rol
                </a>
            </div>
        </div>
    </div>
</div>
@endsection