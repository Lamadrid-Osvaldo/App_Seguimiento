@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="mb-3">
                <a href="{{ route('usuarios.index') }}" class="text-decoration-none text-secondary small">
                    <i class="bi bi-arrow-left"></i> Volver al listado
                </a>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3 border-0">
                    <h4 class="fw-bold text-primary m-0">
                        <i class="bi bi-pencil-square me-2"></i>Editar Usuario
                    </h4>
                </div>
                
                <div class="card-body p-4">
                    <form action="{{ route('usuarios.update', $usuario->nis) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase">Nombre Completo</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-person"></i></span>
                                <input type="text" name="nombre" class="form-control border-start-0 bg-light @error('nombre') is-invalid @enderror" 
                                       value="{{ old('nombre', $usuario->nombre) }}" required>
                            </div>
                            @error('nombre')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase">Correo Electrónico</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email" class="form-control border-start-0 bg-light @error('email') is-invalid @enderror" 
                                       value="{{ old('email', $usuario->email) }}" required>
                            </div>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase">Contraseña</label>
                            <input type="password" name="contrasena" class="form-control bg-light @error('contrasena') is-invalid @enderror" required>
                            @error('contrasena')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase">Confirmar Contraseña</label>
                            <input type="password" name="contrasena_confirmation" class="form-control bg-light @error('contrasena_confirmation') is-invalid @enderror" required>
                            @error('contrasena_confirmation')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="text-muted">

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary fw-bold py-2 shadow-sm">
                                <i class="bi bi-arrow-clockwise me-2"></i>Actualizar Datos
                            </button>
                            <a href="{{ route('usuarios.index') }}" class="btn btn-light py-2">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.querySelector('i').classList.toggle('bi-eye');
        this.querySelector('i').classList.toggle('bi-eye-slash');
    });
</script>
@endsection