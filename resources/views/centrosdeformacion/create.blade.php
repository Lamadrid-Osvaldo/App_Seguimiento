@extends('layouts.app')

@section('title', 'Agregar Centro de Formación')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-success">
                <div class="card-header bg-success text-white py-3">
                    <h4 class="mb-0"><i class="bi bi-house-add me-2"></i>Registrar Nuevo Centro de Formación</h4>
                </div>

                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger shadow-sm">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li><i class="bi bi-exclamation-octagon me-2"></i>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('centrosdeformacion.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 border-end pe-md-4">
                                <h5 class="text-muted border-bottom pb-2 mb-3 small fw-bold text-uppercase">Información del Centro</h5>
                                
                                <div class="mb-3">
                                    <label for="codigo" class="form-label fw-bold">Código del Centro</label>
                                    <input type="number" id="codigo" name="codigo" value="{{ old('codigo') }}" 
                                           class="form-control @error('codigo') is-invalid @enderror" placeholder="Ej: 9201">
                                </div>

                                <div class="mb-3">
                                    <label for="denominacion" class="form-label fw-bold">Denominación</label>
                                    <input type="text" id="denominacion" name="denominacion" value="{{ old('denominacion') }}" 
                                           class="form-control @error('denominacion') is-invalid @enderror" placeholder="Nombre completo del centro">
                                </div>

                                <div class="mb-3">
                                    <label for="direccion" class="form-label fw-bold">Dirección</label>
                                    <input type="text" id="direccion" name="direccion" value="{{ old('direccion') }}" 
                                           class="form-control @error('direccion') is-invalid @enderror" placeholder="Ubicación física">
                                </div>
                            </div>

                            <div class="col-md-6 ps-md-4">
                                <h5 class="text-muted border-bottom pb-2 mb-3 small fw-bold text-uppercase">Administración</h5>
                                
                                <div class="mb-3">
                                    <label for="tblregionales_nis" class="form-label fw-bold">Regional Correspondiente</label>
                                    <select id="tblregionales_nis" name="tblregionales_nis" class="form-select border-primary shadow-sm">
                                        <option value="" selected disabled>Elija una Regional...</option>
                                        @foreach($regionales as $regional)
                                            <option value="{{ $regional->nis }}" {{ old('tblregionales_nis') == $regional->nis ? 'selected' : '' }}>
                                                {{ $regional->denominacion }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="observaciones" class="form-label fw-bold">Observaciones</label>
                                    <textarea id="observaciones" name="observaciones" class="form-control" rows="4" 
                                              placeholder="Detalles o notas adicionales...">{{ old('observaciones') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start gap-2 mt-4 pt-3 border-top">
                            <button type="submit" class="btn btn-success px-5 fw-bold shadow-sm">
                                <i class="bi bi-save me-2"></i> Guardar Centro
                            </button>
                            <a href="{{ route('centrosdeformacion.index') }}" class="btn btn-secondary px-4">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection