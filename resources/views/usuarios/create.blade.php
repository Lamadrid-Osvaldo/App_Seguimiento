@extends('layouts.app')

@section('title', 'Registrar Usuario')

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
                        <i class="bi bi-person-plus-fill me-2"></i>Nuevo Usuario
                    </h4>
                </div>
                
                <div class="card-body p-4">
                    <form action="{{ route('usuarios.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase">Nombre Completo</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-person"></i></span>
                                <input type="text" name="nombre" class="form-control border-start-0 bg-light @error('nombre') is-invalid @enderror" 
                                       placeholder="Ej: Juan Pérez" value="{{ old('nombre') }}" required>
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
                                       placeholder="correo@ejemplo.com" value="{{ old('email') }}" required>
                            </div>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase">Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock"></i></span>
                                <input type="password" name="contrasena" id="password" 
                                       class="form-control border-start-0 bg-light @error('contrasena') is-invalid @enderror" 
                                       placeholder="Asigna una clave" required>
                                <button class="btn btn-light border border-start-0" type="button" id="togglePassword">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
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
                            <div class="form-text small">Como es para pruebas, puedes verla antes de guardar.</div>
                            @error('contrasena')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="text-muted">

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success fw-bold py-2 shadow-sm">
                                <i class="bi bi-save me-2"></i>Guardar Usuario
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

    togglePassword.addEventListener('click', function (e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.querySelector('i').classList.toggle('bi-eye');
        this.querySelector('i').classList.toggle('bi-eye-slash');
    });
</script>
@endsection