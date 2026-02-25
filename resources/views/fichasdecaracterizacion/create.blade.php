@extends('layouts.app')

@section('title', 'Agregar Ficha')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-success">
                <div class="card-header bg-success text-white py-3">
                    <h4 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Nueva Ficha de Caracterización</h4>
                </div>

                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger shadow-sm">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li><i class="bi bi-exclamation-triangle me-2"></i>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('fichasdecaracterizacion.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 border-end pe-md-4">
                                <h5 class="text-muted border-bottom pb-2 mb-3 small fw-bold text-uppercase">Datos Básicos</h5>
                                
                                <div class="mb-3">
                                    <label for="codigo" class="form-label fw-bold">Código de la Ficha</label>
                                    <input type="number" id="codigo" name="codigo" value="{{ old('codigo') }}" 
                                           class="form-control @error('codigo') is-invalid @enderror" placeholder="Ej: 2503412">
                                </div>

                                <div class="mb-3">
                                    <label for="denominacion" class="form-label fw-bold">Denominación</label>
                                    <input type="text" id="denominacion" name="denominacion" value="{{ old('denominacion') }}" 
                                           class="form-control @error('denominacion') is-invalid @enderror" placeholder="Nombre del grupo">
                                </div>

                                <div class="mb-3">
                                    <label for="cupo" class="form-label fw-bold">Cupo</label>
                                    <input type="number" id="cupo" name="cupo" value="{{ old('cupo') }}" 
                                           class="form-control @error('cupo') is-invalid @enderror" placeholder="Cantidad de aprendices">
                                </div>
                            </div>

                            <div class="col-md-6 ps-md-4">
                                <h5 class="text-muted border-bottom pb-2 mb-3 small fw-bold text-uppercase">Vigencia y Ubicación</h5>
                                
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="fechainicio" class="form-label fw-bold text-success">Fecha de Inicio</label>
                                        <input type="date" id="fechainicio" name="fechainicio" value="{{ old('fechainicio') }}" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="fechafin" class="form-label fw-bold text-danger">Fecha de Fin</label>
                                        <input type="date" id="fechafin" name="fechafin" value="{{ old('fechafin') }}" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="tblcentrosdeformacion_nis" class="form-label fw-bold">Centro de Formación</label>
                                    <select id="tblcentrosdeformacion_nis" name="tblcentrosdeformacion_nis" class="form-select border-primary shadow-sm">
                                        <option value="" selected disabled>Seleccione un Centro...</option>
                                        @foreach($centrosdeformacion as $centro)
                                            <option value="{{ $centro->nis }}" {{ old('tblcentrosdeformacion_nis') == $centro->nis ? 'selected' : '' }}>
                                                {{ $centro->denominacion }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="tblprogramasdeformacion_nis" class="form-label fw-bold">Programa de Formación</label>
                                    <select id="tblprogramasdeformacion_nis" name="tblprogramasdeformacion_nis" class="form-select border-success shadow-sm">
                                        <option value="" selected disabled>Seleccione un Programa...</option>
                                        @foreach($programasdeformacion as $programa)
                                            <option value="{{ $programa->nis }}" {{ old('tblprogramasdeformacion_nis') == $programa->nis ? 'selected' : '' }}>
                                                {{ $programa->denominacion }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12">
                                <label for="observaciones" class="form-label fw-bold">Observaciones</label>
                                <textarea id="observaciones" name="observaciones" class="form-control" rows="2" placeholder="Notas adicionales...">{{ old('observaciones') }}</textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start gap-2 mt-4 pt-3 border-top">
                            <button type="submit" class="btn btn-success px-5 fw-bold shadow-sm">
                                <i class="bi bi-save me-2"></i>Guardar Ficha
                            </button>
                            <a href="{{ route('fichasdecaracterizacion.index') }}" class="btn btn-secondary px-4">
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