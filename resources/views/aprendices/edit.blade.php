@extends('layouts.app')

@section('title', 'Editar Aprendiz')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card shadow-sm border-warning">
                <div class="card-header bg-warning text-dark py-3">
                    <h4 class="mb-0">
                        <i class="bi bi-pencil-square me-2"></i>Editar Aprendiz: {{ $aprendices->nombres }}
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

                    <form method="POST" action="{{ route('aprendices.update', $aprendices->nis) }}">
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
                                                <option value="{{ $tipo->nis }}" {{ old('tbltiposdocumentos_nis', $aprendices->tbltiposdocumentos_nis) == $tipo->nis ? 'selected' : '' }}>
                                                    {{ $tipo->denominacion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-7">
                                        <label class="form-label fw-bold small">Número de Documento</label>
                                        <input type="number" name="numdoc" class="form-control" value="{{ old('numdoc', $aprendices->numdoc) }}">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Nombres</label>
                                    <input type="text" name="nombres" class="form-control" value="{{ old('nombres', $aprendices->nombres) }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Apellidos</label>
                                    <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos', $aprendices->apellidos) }}">
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small">Sexo</label>
                                        <select name="sexo" class="form-select">
                                            <option value="1" {{ old('sexo', $aprendices->sexo) == 1 ? 'selected' : '' }}>Hombre</option>
                                            <option value="2" {{ old('sexo', $aprendices->sexo) == 2 ? 'selected' : '' }}>Mujer</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small">Fecha Nacimiento</label>
                                        <input type="date" name="fechanac" class="form-control" value="{{ old('fechanac', $aprendices->fechanac?->format('Y-m-d')) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 ps-md-4">
                                <h5 class="text-primary mb-3 small fw-bold text-uppercase border-bottom pb-2">Contacto y Registro</h5>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Dirección de Residencia</label>
                                    <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $aprendices->direccion) }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Teléfono / Celular</label>
                                    <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $aprendices->telefono) }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Correo Institucional</label>
                                    <input type="email" name="correoinstitucional" class="form-control" value="{{ old('correoinstitucional', $aprendices->correoinstitucional) }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Correo Personal</label>
                                    <input type="email" name="correopersonal" class="form-control" value="{{ old('correopersonal', $aprendices->correopersonal) }}" placeholder="ejemplo@correo.com">
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small">EPS</label>
                                        <select name="tbleps_nis" class="form-select border-danger border-opacity-25">
                                            @foreach($eps as $ep)
                                                <option value="{{ $ep->nis }}" {{ old('tbleps_nis', $aprendices->tbleps_nis) == $ep->nis ? 'selected' : '' }}>
                                                    {{ $ep->denominacion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small">Ficha</label>
                                        <select name="tblfichasdecaracterizacion_nis" class="form-select border-primary border-opacity-25">
                                            @foreach($fichas as $ficha)
                                                <option value="{{ $ficha->nis }}" {{ old('tblfichasdecaracterizacion_nis', $aprendices->tblfichasdecaracterizacion_nis) == $ficha->nis ? 'selected' : '' }}>
                                                    {{ $ficha->denominacion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                            <a href="{{ route('aprendices.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                            <button type="submit" class="btn btn-primary px-4 shadow-sm">
                                <i class="bi bi-save me-1"></i> Actualizar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection