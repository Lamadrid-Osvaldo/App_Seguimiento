@extends('layouts.app')

@section('title', 'Editar Ente Coformador')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-sm border-warning">
            <div class="card-header bg-warning text-dark py-3">
                <h4 class="mb-0">
                    <i class="bi bi-pencil-square me-2"></i>Editar Ente: {{ $entecoformadores->razonsocial }}
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

                <form action="{{ route('entecoformadores.update', $entecoformadores->nis) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 border-end pe-md-4">
                            <h5 class="text-muted mb-3 small fw-bold text-uppercase">Identificación</h5>
                            
                            <div class="mb-3">
                                <label for="tdoc" class="form-label fw-bold small">Tipo de Documento</label>
                                <input type="text" id="tdoc" name="tdoc" 
                                       class="form-control @error('tdoc') is-invalid @enderror" 
                                       value="{{ old('tdoc', $entecoformadores->tdoc) }}">
                            </div>

                            <div class="mb-3">
                                <label for="numdoc" class="form-label fw-bold small">Número de Documento</label>
                                <input type="number" id="numdoc" name="numdoc" 
                                       class="form-control @error('numdoc') is-invalid @enderror" 
                                       value="{{ old('numdoc', $entecoformadores->numdoc) }}">
                            </div>

                            <div class="mb-3">
                                <label for="razonsocial" class="form-label fw-bold small">Razón Social</label>
                                <input type="text" id="razonsocial" name="razonsocial" 
                                       class="form-control @error('razonsocial') is-invalid @enderror" 
                                       value="{{ old('razonsocial', $entecoformadores->razonsocial) }}">
                            </div>
                        </div>

                        <div class="col-md-6 ps-md-4">
                            <h5 class="text-muted mb-3 small fw-bold text-uppercase">Datos de Contacto</h5>

                            <div class="mb-3">
                                <label for="direccion" class="form-label fw-bold small">Dirección</label>
                                <input type="text" id="direccion" name="direccion" 
                                       class="form-control @error('direccion') is-invalid @enderror" 
                                       value="{{ old('direccion', $entecoformadores->direccion) }}">
                            </div>

                            <div class="mb-3">
                                <label for="telefono" class="form-label fw-bold small">Teléfono</label>
                                <input type="text" id="telefono" name="telefono" 
                                       class="form-control @error('telefono') is-invalid @enderror" 
                                       value="{{ old('telefono', $entecoformadores->telefono) }}">
                            </div>

                            <div class="mb-3">
                                <label for="correoinstitucional" class="form-label fw-bold small">Correo Institucional</label>
                                <input type="email" id="correoinstitucional" name="correoinstitucional" 
                                       class="form-control @error('correoinstitucional') is-invalid @enderror" 
                                       value="{{ old('correoinstitucional', $entecoformadores->correoinstitucional) }}">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-3 border-top mt-4">
                        <a href="{{ route('entecoformadores.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-x-circle"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-warning px-5 fw-bold shadow-sm text-dark">
                            <i class="bi bi-arrow-clockwise"></i> Actualizar Ente
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection