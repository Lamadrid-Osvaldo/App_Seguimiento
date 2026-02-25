@extends('layouts.app')

@section('title', 'Editar Tipo de Documento')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-warning">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">
                    <i class="bi bi-pencil-square"></i> Editar Registro: {{ $tiposdocumentos->denominacion }}
                </h4>
            </div>
            <div class="card-body">
                
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

                <form action="{{ route('tiposdocumentos.update', $tiposdocumentos->nis) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="denominacion" class="form-label fw-bold">Denominación</label>
                        <input type="text" 
                               name="denominacion" 
                               id="denominacion"
                               value="{{ old('denominacion', $tiposdocumentos->denominacion) }}" 
                               class="form-control @error('denominacion') is-invalid @enderror"
                               placeholder="Ej: Cédula de Extranjería">
                    </div>

                    <div class="mb-4">
                        <label for="observaciones" class="form-label fw-bold">Observaciones</label>
                        <textarea name="observaciones" 
                                  id="observaciones"
                                  class="form-control @error('observaciones') is-invalid @enderror" 
                                  rows="3"
                                  placeholder="Detalles adicionales...">{{ old('observaciones', $tiposdocumentos->observaciones) }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('tiposdocumentos.index') }}" class="btn btn-link text-decoration-none text-muted p-0">
                            <i class="bi bi-x-circle"></i> Descartar cambios
                        </a>
                        <button type="submit" class="btn btn-warning fw-bold shadow-sm">
                            <i class="bi bi-arrow-clockwise"></i> Actualizar Registro
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection