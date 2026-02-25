@extends('layouts.app')

@section('title', 'Agregar Ente Coformador')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow border-0">
            <div class="card-header bg-success text-white py-3">
                <h4 class="mb-0"><i class="bi bi-building-add me-2"></i>Registrar Nuevo Ente Coformador</h4>
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

                <form method="POST" action="{{ route('entecoformadores.store') }}">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="tdoc" class="form-label fw-bold">Tipo Documento</label>
                            <input type="text" id="tdoc" name="tdoc" 
                                   class="form-control @error('tdoc') is-invalid @enderror" 
                                   value="{{ old('tdoc') }}" placeholder="Ej: NIT o CC">
                        </div>
                        <div class="col-md-8">
                            <label for="numdoc" class="form-label fw-bold">Número de Documento</label>
                            <input type="number" id="numdoc" name="numdoc" 
                                   class="form-control @error('numdoc') is-invalid @enderror" 
                                   value="{{ old('numdoc') }}" placeholder="Sin puntos ni guiones">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="razonsocial" class="form-label fw-bold">Razón Social / Nombre Completo</label>
                            <input type="text" id="razonsocial" name="razonsocial" 
                                   class="form-control @error('razonsocial') is-invalid @enderror" 
                                   value="{{ old('razonsocial') }}" placeholder="Nombre legal de la entidad">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="direccion" class="form-label fw-bold">Dirección</label>
                            <input type="text" id="direccion" name="direccion" 
                                   class="form-control @error('direccion') is-invalid @enderror" 
                                   value="{{ old('direccion') }}" placeholder="Dirección física">
                        </div>
                        <div class="col-md-4">
                            <label for="telefono" class="form-label fw-bold">Teléfono</label>
                            <input type="text" id="telefono" name="telefono" 
                                   class="form-control @error('telefono') is-invalid @enderror" 
                                   value="{{ old('telefono') }}" placeholder="Número de contacto">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12">
                            <label for="correoinstitucional" class="form-label fw-bold">Correo Institucional</label>
                            <input type="email" id="correoinstitucional" name="correoinstitucional" 
                                   class="form-control @error('correoinstitucional') is-invalid @enderror" 
                                   value="{{ old('correoinstitucional') }}" placeholder="ejemplo@entidad.com">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <a href="{{ route('entecoformadores.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar y volver
                        </a>
                        <button type="submit" class="btn btn-success px-5 shadow-sm">
                            <i class="bi bi-save"></i> Guardar Ente
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection