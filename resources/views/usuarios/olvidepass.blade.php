@extends('layouts.auth') 

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card shadow-sm" style="width: 100%; max-width: 400px; border-top: 5px solid #39A900;">
        <div class="card-body">
            <h2 class="text-center mb-4">¿Olvidaste tu clave?</h2>
            
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" class="form-control" required placeholder="ejemplo@correo.com">
                </div>
                <button type="submit" class="btn w-100" style="background-color: #39A900; color: white;">
                    Enviar Enlace
                </button>
            </form>
            
            <div class="text-center mt-3">
                <a href="{{ url('/login') }}" class="text-muted small text-decoration-none">← Volver al login</a>
            </div>
        </div>
    </div>
</div>
@endsection