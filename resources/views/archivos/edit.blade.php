@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Actualizar Archivo (NIS: {{ $archivo->nis }})</h5>
                </div>
                <div class="card-body p-4">
                    
                    <form action="{{ route('archivos.update', $archivo->nis) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4 text-center p-3 bg-light rounded border">
                            <label class="d-block text-muted small mb-2">Archivo almacenado actualmente:</label>
                            <span class="d-block font-weight-bold text-truncate">
                                <i class="fas fa-file-alt mr-2"></i> {{ $archivo->nombre_original }}
                            </span>
                        </div>

                        <div class="form-group mb-4">
                            <label for="archivo_file" class="font-weight-bold">Subir nuevo archivo</label>
                            <div class="custom-file">
                                <input type="file" name="archivo_file" id="archivo_file" 
                                    class="custom-file-input @error('archivo_file') is-invalid @enderror">
                                <label class="custom-file-label" for="archivo_file">Elegir archivo...</label>
                            </div>
                            <small class="form-text text-muted">
                                Formatos permitidos: PDF, JPG, PNG, DOCX. Máx 5MB.
                            </small>
                            @error('archivo_file')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('archivos.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save"></i> Actualizar Ahora
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector('.custom-file-input').addEventListener('change', function(e){
        var fileName = document.getElementById("archivo_file").files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });
</script>
@endsection