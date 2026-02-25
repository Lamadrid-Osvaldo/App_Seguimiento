@extends('layouts.app')

@section('title', 'Editar EPS')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-warning">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">Modificar Registro: {{ $eps->denominacion }}</h4>
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

                <form action="{{ route('eps.update', $eps->nis) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="numdoc" class="form-label fw-bold">Número de la EPS (Documento)</label>
                        <input type="text" 
                               name="numdoc" 
                               id="numdoc"
                               value="{{ old('numdoc', $eps->numdoc) }}" 
                               class="form-control @error('numdoc') is-invalid @enderror">
                    </div>

                    <div class="mb-3">
                        <label for="denominacion" class="form-label fw-bold">Denominación</label>
                        <input type="text" 
                               name="denominacion" 
                               id="denominacion"
                               value="{{ old('denominacion', $eps->denominacion) }}" 
                               class="form-control @error('denominacion') is-invalid @enderror">
                    </div>

                    <div class="mb-4">
                        <label for="observaciones" class="form-label fw-bold">Observaciones</label>
                        <textarea name="observaciones" 
                                  id="observaciones"
                                  class="form-control" 
                                  rows="3">{{ old('observaciones', $eps->observaciones) }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('eps.index') }}" class="text-decoration-none text-muted">
                            <i class="bi bi-x-circle"></i> Descartar cambios
                        </a>
                        <button type="submit" class="btn btn-warning px-4 fw-bold">
                            <i class="bi bi-arrow-clockwise"></i> Actualizar Registro
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection