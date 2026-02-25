@extends('layouts.app')

@section('title', 'Lista de Fichas')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="text-primary fw-bold">Lista de Fichas de Caracterización</h2>
            <p class="text-muted small">Gestión de grupos y programas académicos</p>
        </div>
        <a href="{{ route('fichasdecaracterizacion.create') }}" class="btn btn-success shadow-sm">
            <i class="bi bi-plus-lg"></i> Agregar nueva ficha
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    {{-- Volvemos al table-light para mantener la uniformidad con los otros módulos --}}
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">NIS</th>
                            <th>Código</th>
                            <th>Denominación</th>
                            <th>Cupo</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                            <th>Centro de Formación</th>
                            <th>Programa de Formación</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($fichasdecaracterizacion as $ficha)
                        <tr>
                            <td class="ps-4 text-muted small">{{ $ficha->nis }}</td>
                            <td><span class="fw-bold">{{ $ficha->codigo }}</span></td>
                            <td>{{ $ficha->denominacion }}</td>
                            <td class="text-center">{{ $ficha->cupo }}</td>
                            <td>{{ $ficha->fechainicio?->format('d/m/Y') ?? 'No asignado' }}</td>
                            <td>{{ $ficha->fechafin?->format('d/m/Y') ?? 'No asignado' }}</td>
                            
                            {{-- Denominaciones de las Foreign Keys --}}
                            <td class="small text-wrap" style="max-width: 200px;">
                                {{ $ficha->centrosdeformacion->denominacion ?? 'No asignado' }}
                            </td>
                            <td class="small text-wrap" style="max-width: 200px;">
                                {{ $ficha->programasdeformacion->denominacion ?? 'No asignado' }}
                            </td>

                            <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('fichasdecaracterizacion.show', $ficha->nis) }}" 
                                class="btn btn-outline-info" title="Ver detalle">
                                    <i class="bi bi-eye"></i> Ver
                                </a>

                        <a href="{{ route('fichasdecaracterizacion.edit', $ficha->nis) }}" 
                        class="btn btn-outline-warning" title="Editar">
                            <i class="bi bi-pencil"></i> Editar
                        </a>

                        <form action="{{ route('fichasdecaracterizacion.destroy', $ficha->nis) }}" 
                            method="POST" class="d-inline form-eliminar">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" 
                                    title="Eliminar" 
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-5 text-muted">No hay registros disponibles</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection