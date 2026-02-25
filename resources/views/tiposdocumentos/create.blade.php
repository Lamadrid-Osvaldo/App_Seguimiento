@extends('layouts.app')

@section('title', 'Agregar Tipo de Documento')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Registrar Nuevo Tipo de Documento</h4>
            </div>
            <div class="card-body">
                
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

                <form method="POST" action="{{ route('tiposdocumentos.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="denominacion" class="form-label fw-bold">Denominación</label>
                        <input type="text" 
                               id="denominacion" 
                               name="denominacion" 
                               class="form-control @error('denominacion') is-invalid @enderror" 
                               value="{{ old('denominacion') }}" 
                               placeholder="Ej: Cédula de Ciudadanía"
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="observaciones" class="form-label fw-bold">Observaciones</label>
                        <textarea id="observaciones" 
                                  name="observaciones" 
                                  class="form-control" 
                                  rows="3" 
                                  placeholder="Descripción breve del documento">{{ old('observaciones') }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('tiposdocumentos.index') }}" class="text-decoration-none text-muted">
                            <i class="bi bi-arrow-left"></i> Cancelar y volver
                        </a>
                        <button type="submit" class="btn btn-success px-4">
                            <i class="bi bi-save"></i> Guardar Tipo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection