@extends('layouts.app')

@section('title', 'Agregar Aprendiz')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card shadow-sm border-success">
                <div class="card-header bg-success text-white py-3">
                    <h4 class="mb-0">
                        <i class="bi bi-person-plus-fill me-2"></i>Registrar Nuevo Aprendiz
                    </h4>
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

                    <form method="POST" action="{{ route('aprendices.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 border-end pe-md-4">
                                <h5 class="text-success mb-3 small fw-bold text-uppercase border-bottom pb-2">Identificación Personal</h5>
                                
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <label class="form-label fw-bold small">Tipo Doc.</label>
                                        <select name="tbltiposdocumentos_nis" class="form-select @error('tbltiposdocumentos_nis') is-invalid @enderror">
                                            <option value="" selected disabled>Seleccione...</option>
                                            @foreach($tiposDocumentos as $tipo)
                                                <option value="{{ $tipo->nis }}" {{ old('tbltiposdocumentos_nis') == $tipo->nis ? 'selected' : '' }}>
                                                    {{ $tipo->denominacion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-7">
                                        <label class="form-label fw-bold small">Número de Documento</label>
                                        <input type="number" name="numdoc" class="form-control" value="{{ old('numdoc') }}" placeholder="Ej: 10203040">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Nombres</label>
                                    <input type="text" name="nombres" class="form-control" value="{{ old('nombres') }}" placeholder="Escribe los nombres">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Apellidos</label>
                                    <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos') }}" placeholder="Escribe los apellidos">
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small">Sexo</label>
                                        <select name="sexo" class="form-select">
                                            <option value="1" {{ old('sexo') == 1 ? 'selected' : '' }}>Masculino</option>
                                            <option value="2" {{ old('sexo') == 2 ? 'selected' : '' }}>Femenino</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small">Fecha Nacimiento</label>
                                        <input type="date" name="fechanac" class="form-control" value="{{ old('fechanac') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 ps-md-4">
                                <h5 class="text-success mb-3 small fw-bold text-uppercase border-bottom pb-2">Contacto y Registro</h5>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Dirección de Residencia</label>
                                    <input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}" placeholder="Dirección actual">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Teléfono / Celular</label>
                                    <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}" placeholder="Ej: 3001234567">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Correo Institucional</label>
                                    <input type="email" name="correoinstitucional" class="form-control" value="{{ old('correoinstitucional') }}" placeholder="usuario@soy.sena.edu.co">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Correo Personal</label>
                                    <input type="email" name="correopersonal" class="form-control" value="{{ old('correopersonal') }}" placeholder="ejemplo@gmail.com">
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small text-danger">EPS</label>
                                        <select name="tbleps_nis" class="form-select border-danger border-opacity-25">
                                            <option value="" selected disabled>Seleccione EPS...</option>
                                            @foreach($eps as $ep)
                                                <option value="{{ $ep->nis }}" {{ old('tbleps_nis') == $ep->nis ? 'selected' : '' }}>
                                                    {{ $ep->denominacion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small text-primary">Ficha</label>
                                        <select name="tblfichasdecaracterizacion_nis" class="form-select border-primary border-opacity-25">
                                            <option value="" selected disabled>Seleccione Ficha...</option>
                                            @foreach($fichas as $ficha)
                                                <option value="{{ $ficha->nis }}" {{ old('tblfichasdecaracterizacion_nis') == $ficha->nis ? 'selected' : '' }}>
                                                    {{ $ficha->denominacion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                            <a href="{{ route('aprendices.index') }}" class="btn btn-outline-secondary px-4">Cancelar</a>
                            <button type="submit" class="btn btn-success px-5 shadow-sm fw-bold">
                                <i class="bi bi-save me-2"></i>Guardar Aprendiz
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection