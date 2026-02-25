@extends('layouts.app')

@section('title', 'Editar Instructor')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card shadow-sm border-warning">
                <div class="card-header bg-warning text-dark py-3">
                    <h4 class="mb-0">
                        <i class="bi bi-pencil-square me-2"></i>Editar Instructor: {{ $instructores->nombres }} {{ $instructores->apellidos }}
                    </h4>
                </div>

                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger shadow-sm">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li><i class="bi bi-exclamation-triangle-fill me-2"></i>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('instructores.update', $instructores->nis) }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 border-end pe-md-4">
                                <h5 class="text-primary mb-3 small fw-bold text-uppercase border-bottom pb-2">Identificación Personal</h5>
                                
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <label class="form-label fw-bold small">Tipo Doc.</label>
                                        <select name="tbltiposdocumentos_nis" class="form-select shadow-sm">
                                            @foreach($tiposDocumentos as $tipo)
                                                <option value="{{ $tipo->nis }}" {{ old('tbltiposdocumentos_nis', $instructores->tbltiposdocumentos_nis) == $tipo->nis ? 'selected' : '' }}>
                                                    {{ $tipo->denominacion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-7">
                                        <label class="form-label fw-bold small">Número de Documento</label>
                                        <input type="number" name="numdoc" class="form-control" value="{{ old('numdoc', $instructores->numdoc) }}">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Nombres</label>
                                    <input type="text" name="nombres" class="form-control" value="{{ old('nombres', $instructores->nombres) }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Apellidos</label>
                                    <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos', $instructores->apellidos) }}">
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small">Sexo</label>
                                        <select name="sexo" class="form-select">
                                            <option value="1" {{ old('sexo', $instructores->sexo) == 1 ? 'selected' : '' }}>Hombre</option>
                                            <option value="2" {{ old('sexo', $instructores->sexo) == 2 ? 'selected' : '' }}>Mujer</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small">Fecha Nacimiento</label>
                                        <input type="date" name="fechanac" class="form-control" value="{{ old('fechanac', $instructores->fechanac?->format('Y-m-d')) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 ps-md-4">
                                <h5 class="text-primary mb-3 small fw-bold text-uppercase border-bottom pb-2">Contacto y Cargo</h5>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Dirección de Residencia</label>
                                    <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $instructores->direccion) }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Teléfono / Celular</label>
                                    <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $instructores->telefono) }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Correo Institucional</label>
                                    <input type="email" name="correoinstitucional" class="form-control" value="{{ old('correoinstitucional', $instructores->correoinstitucional) }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Correo Personal</label>
                                    <input type="email" name="correopersonal" class="form-control" value="{{ old('correopersonal', $instructores->correopersonal) }}">
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small">EPS</label>
                                        <select name="tbleps_nis" class="form-select border-danger border-opacity-25">
                                            @foreach($eps as $ep)
                                                <option value="{{ $ep->nis }}" {{ old('tbleps_nis', $instructores->tbleps_nis) == $ep->nis ? 'selected' : '' }}>
                                                    {{ $ep->denominacion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small text-danger">Rol Administrativo</label>
                                        <select name="tblrolesadministrativos_nis" class="form-select border-danger">
                                            @foreach($roles as $rol)
                                                <option value="{{ $rol->nis }}" {{ old('tblrolesadministrativos_nis', $instructores->tblrolesadministrativos_nis) == $rol->nis ? 'selected' : '' }}>
                                                    {{ $rol->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                            <a href="{{ route('instructores.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                            <button type="submit" class="btn btn-primary px-4 shadow-sm">
                                <i class="bi bi-save me-1"></i> Actualizar Instructor
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection