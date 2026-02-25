@extends('layouts.app')

@section('title', 'Agregar EPS')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Registrar Nueva EPS</h4>
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

                <form method="POST" action="{{ route('eps.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="numdoc" class="form-label fw-bold">Número de la EPS</label>
                        <input type="number" 
                               id="numdoc" 
                               name="numdoc" 
                               class="form-control @error('numdoc') is-invalid @enderror" 
                               value="{{ old('numdoc') }}" 
                               placeholder="Ej: 800123456">
                    </div>

                    <div class="mb-3">
                        <label for="denominacion" class="form-label fw-bold">Denominación</label>
                        <input type="text" 
                               id="denominacion" 
                               name="denominacion" 
                               class="form-control @error('denominacion') is-invalid @enderror" 
                               value="{{ old('denominacion') }}" 
                               placeholder="Nombre de la entidad">
                    </div>

                    <div class="mb-4">
                        <label for="observaciones" class="form-label fw-bold">Observaciones</label>
                        <textarea id="observaciones" 
                                  name="observaciones" 
                                  class="form-control" 
                                  rows="3" 
                                  placeholder="Información adicional (opcional)">{{ old('observaciones') }}</textarea>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('eps.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Guardar Registro
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection