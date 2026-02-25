@extends('layouts.app')

@section('title', 'Agregar Regional')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow border-0">
            <div class="card-header bg-success text-white py-3">
                <h4 class="mb-0">
                    <i class="bi bi-geo-alt-fill me-2"></i>Registrar Nueva Regional
                </h4>
            </div>
            <div class="card-body p-4">
                
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('regionales.store') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="codigo" class="form-label fw-bold">Código Regional</label>
                            <input type="number" 
                                   id="codigo" 
                                   name="codigo" 
                                   class="form-control @error('codigo') is-invalid @enderror" 
                                   value="{{ old('codigo') }}" 
                                   placeholder="Ej: 05">
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="denominacion" class="form-label fw-bold">Nombre / Denominación</label>
                            <input type="text" 
                                   id="denominacion" 
                                   name="denominacion" 
                                   class="form-control @error('denominacion') is-invalid @enderror" 
                                   value="{{ old('denominacion') }}" 
                                   placeholder="Nombre de la sede regional">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="observaciones" class="form-label fw-bold">Observaciones</label>
                        <textarea id="observaciones" 
                                  name="observaciones" 
                                  class="form-control @error('observaciones') is-invalid @enderror" 
                                  rows="3" 
                                  placeholder="Detalles adicionales sobre esta regional...">{{ old('observaciones') }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                        <a href="{{ route('regionales.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Regresar
                        </a>
                        <button type="submit" class="btn btn-success px-5 shadow-sm">
                            <i class="bi bi-save"></i> Guardar Regional
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection