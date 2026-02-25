@extends('layouts.app')

@section('title', 'Editar Centro')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-warning">
                <div class="card-header bg-warning text-dark py-3">
                    <h4 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Editar Centro de Formación</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('centrosdeformacion.update', $centrosdeformacion->nis) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 border-end pe-md-4">
                                <h5 class="text-muted border-bottom pb-2 mb-3 small fw-bold text-uppercase">Identificación del Centro</h5>
                                
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Código del Centro</label>
                                    <input type="number" name="codigo" value="{{ old('codigo', $centrosdeformacion->codigo) }}" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Denominación</label>
                                    <input type="text" name="denominacion" value="{{ old('denominacion', $centrosdeformacion->denominacion) }}" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Dirección</label>
                                    <input type="text" name="direccion" value="{{ old('direccion', $centrosdeformacion->direccion) }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6 ps-md-4">
                                <h5 class="text-muted border-bottom pb-2 mb-3 small fw-bold text-uppercase">Vinculación Administrativa</h5>
                                
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Regional Asociada</label>
                                    <select name="tblregionales_nis" class="form-select border-primary shadow-sm" required>
                                        <option value="" disabled>Seleccione una Regional...</option>
                                        @foreach($regionales as $regional)
                                            <option value="{{ $regional->nis }}" 
                                                {{ $centrosdeformacion->tblregionales_nis == $regional->nis ? 'selected' : '' }}>
                                                {{ $regional->denominacion }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted">Elija la regional a la que pertenece este centro.</small>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Observaciones</label>
                                    <textarea name="observaciones" class="form-control" rows="4" placeholder="Notas sobre el centro...">{{ old('observaciones', $centrosdeformacion->observaciones) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start gap-2 mt-4 pt-3 border-top">
                            <button type="submit" class="btn btn-primary px-4 shadow-sm">
                                <i class="bi bi-check-circle me-1"></i> Actualizar Cambios
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