@extends('layouts.app')

@section('title', 'Editar Ficha')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-warning">
                <div class="card-header bg-warning text-dark py-3">
                    <h4 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Editar Ficha: {{ $fichasdecaracterizacion->denominacion }}</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('fichasdecaracterizacion.update', $fichasdecaracterizacion->nis) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 border-end">
                                <h5 class="text-muted border-bottom pb-2 mb-3 small fw-bold text-uppercase">Información General</h5>
                                
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Código de Ficha</label>
                                    <input type="text" name="codigo" value="{{ old('codigo', $fichasdecaracterizacion->codigo) }}" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Denominación / Nombre</label>
                                    <input type="text" name="denominacion" value="{{ old('denominacion', $fichasdecaracterizacion->denominacion) }}" class="form-control" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Cupo</label>
                                            <input type="number" name="cupo" value="{{ old('cupo', $fichasdecaracterizacion->cupo) }}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 ps-md-4">
                                <h5 class="text-muted border-bottom pb-2 mb-3 small fw-bold text-uppercase">Cronograma y Vinculación</h5>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold text-success">Fecha de Inicio</label>
                                        <input type="date" name="fechainicio" value="{{ old('fechainicio', $fichasdecaracterizacion->fechainicio?->format('Y-m-d')) }}" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold text-danger">Fecha de Fin</label>
                                        <input type="date" name="fechafin" value="{{ old('fechafin', $fichasdecaracterizacion->fechafin?->format('Y-m-d')) }}" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Centro de Formación</label>
                                    <select name="tblcentrosdeformacion_nis" class="form-select shadow-sm border-primary" required>
                                        <option value="">Seleccione un Centro...</option>
                                        @foreach($centrosdeformacion as $centro)
                                            <option value="{{ $centro->nis }}" 
                                                {{ $fichasdecaracterizacion->tblcentrosdeformacion_nis == $centro->nis ? 'selected' : '' }}>
                                                {{ $centro->denominacion }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Programa de Formación</label>
                                    <select name="tblprogramasdeformacion_nis" class="form-select shadow-sm border-success" required>
                                        <option value="">Seleccione un Programa...</option>
                                        @foreach($programasdeformacion as $programa)
                                            <option value="{{ $programa->nis }}" 
                                                {{ $fichasdecaracterizacion->tblprogramasdeformacion_nis == $programa->nis ? 'selected' : '' }}>
                                                {{ $programa->denominacion }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <label class="form-label fw-bold">Observaciones</label>
                            <textarea name="observaciones" class="form-control" rows="3" placeholder="Anotaciones adicionales...">{{ old('observaciones', $fichasdecaracterizacion->observaciones) }}</textarea>
                        </div>

                        <div class="d-flex justify-content-start gap-2 mt-4 pt-3 border-top">
                            <button type="submit" class="btn btn-primary px-4">Actualizar Cambios</button>
                            <a href="{{ route('fichasdecaracterizacion.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection