@extends('layouts.app')

@section('title', 'Editar Regional')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-warning">
            <div class="card-header bg-warning text-dark py-3">
                <h4 class="mb-0">
                    <i class="bi bi-pencil-square me-2"></i>Editar Regional: {{ $regionales->denominacion }}
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

                <form action="{{ route('regionales.update', $regionales->nis) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="codigo" class="form-label fw-bold">Código Regional</label>
                            <input type="text" 
                                   id="codigo" 
                                   name="codigo" 
                                   class="form-control @error('codigo') is-invalid @enderror" 
                                   value="{{ old('codigo', $regionales->codigo) }}">
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="denominacion" class="form-label fw-bold">Nombre de la Regional</label>
                            <input type="text" 
                                   id="denominacion" 
                                   name="denominacion" 
                                   class="form-control @error('denominacion') is-invalid @enderror" 
                                   value="{{ old('denominacion', $regionales->denominacion) }}">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="observaciones" class="form-label fw-bold">Observaciones</label>
                        <textarea id="observaciones" 
                                  name="observaciones" 
                                  class="form-control @error('observaciones') is-invalid @enderror" 
                                  rows="3">{{ old('observaciones', $regionales->observaciones) }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4 border-top pt-3">
                        <a href="{{ route('regionales.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-x-circle"></i> Descartar cambios
                        </a>
                        <button type="submit" class="btn btn-warning px-5 fw-bold shadow-sm">
                            <i class="bi bi-arrow-clockwise"></i> Actualizar Registro
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection