@extends('layouts.app')

@section('title', 'Agregar Instructor')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card shadow-sm border-success">
                <div class="card-header bg-success text-white py-3">
                    <h4 class="mb-0">
                        <i class="bi bi-person-plus-fill me-2"></i>Registrar Nuevo Instructor
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

                    <form method="POST" action="{{ route('instructores.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 border-end pe-md-4">
                                <h5 class="text-success mb-3 small fw-bold text-uppercase border-bottom pb-2">Información Básica</h5>
                                
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <label class="form-label fw-bold small">Tipo Doc.</label>
                                        <select name="tbltiposdocumentos_nis" class="form-select">
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
                                        <input type="number" name="numdoc" class="form-control" value="{{ old('numdoc') }}" placeholder="Ej: 80123456">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Nombres</label>
                                    <input type="text" name="nombres" class="form-control" value="{{ old('nombres') }}" placeholder="Nombres del instructor">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Apellidos</label>
                                    <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos') }}" placeholder="Apellidos del instructor">
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
                                <h5 class="text-success mb-3 small fw-bold text-uppercase border-bottom pb-2">Contacto y Asignación</h5>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Dirección</label>
                                    <input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}" placeholder="Dirección de residencia">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Teléfono</label>
                                    <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}" placeholder="Móvil o fijo">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Correo Institucional</label>
                                    <input type="email" name="correoinstitucional" class="form-control" value="{{ old('correoinstitucional') }}" placeholder="usuario@sena.edu.co">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Correo Personal</label>
                                    <input type="email" name="correopersonal" class="form-control" value="{{ old('correopersonal') }}" placeholder="ejemplo@correo.com">
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
                                        <label class="form-label fw-bold small text-primary">Rol Administrativo</label>
                                        <select name="tblrolesadministrativos_nis" class="form-select border-primary border-opacity-25">
                                            <option value="" selected disabled>Seleccione Rol...</option>
                                            @foreach($roles as $rol)
                                                <option value="{{ $rol->nis }}" {{ old('tblrolesadministrativos_nis') == $rol->nis ? 'selected' : '' }}>
                                                    {{ $rol->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                            <a href="{{ route('instructores.index') }}" class="btn btn-outline-secondary px-4">Cancelar</a>
                            <button type="submit" class="btn btn-success px-5 shadow-sm fw-bold">
                                <i class="bi bi-save me-2"></i>Guardar Instructor
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection