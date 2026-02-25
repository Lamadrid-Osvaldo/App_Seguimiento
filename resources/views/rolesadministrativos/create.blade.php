@extends('layouts.app')

@section('title', 'Agregar Rol Administrativo')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5"> {{-- Un ancho más estrecho ya que es un solo campo --}}
        <div class="card shadow border-0">
            <div class="card-header bg-success text-white py-3">
                <h4 class="mb-0">
                    <i class="bi bi-shield-plus me-2"></i>Nuevo Rol Administrativo
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

                <form method="POST" action="{{ route('rolesadministrativos.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="descripcion" class="form-label fw-bold">Descripción del Rol</label>
                        <input type="text" 
                               id="descripcion" 
                               name="descripcion" 
                               class="form-control @error('descripcion') is-invalid @enderror" 
                               value="{{ old('descripcion') }}" 
                               placeholder="Ej: Coordinador Académico"
                               required>
                        <div class="form-text text-muted">
                            Escriba el nombre del cargo o rol administrativo.
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <a href="{{ route('rolesadministrativos.index') }}" class="text-decoration-none text-muted">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-success px-4 shadow-sm">
                            <i class="bi bi-save"></i> Guardar Rol
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection