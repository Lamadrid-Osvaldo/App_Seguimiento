@extends('layouts.app')

@section('title', 'Editar Rol Administrativo')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-warning">
            <div class="card-header bg-warning text-dark py-3">
                <h4 class="mb-0">
                    <i class="bi bi-pencil-square me-2"></i>Editar Rol: {{ $rolesadministrativos->descripcion }}
                </h4>
            </div>
            
            <div class="card-body p-4">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('rolesadministrativos.update', $rolesadministrativos->nis) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="descripcion" class="form-label fw-bold">Descripción del Rol</label>
                        <textarea id="descripcion" 
                                  name="descripcion" 
                                  class="form-control @error('descripcion') is-invalid @enderror" 
                                  rows="3" 
                                  required>{{ old('descripcion', $rolesadministrativos->descripcion) }}</textarea>
                        <div class="form-text">Modifique el nombre o la descripción del cargo administrativo.</div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <a href="{{ route('rolesadministrativos.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-x-circle"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-warning px-4 fw-bold shadow-sm">
                            <i class="bi bi-arrow-clockwise"></i> Actualizar Registro
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection