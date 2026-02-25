<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema SENA - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; }
        .navbar-sena { background-color: #39a900; } /* Verde SENA */
        .dropdown-item:hover { background-color: #39a900; color: white; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-sena shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">SGEP</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                   <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-bold text-white" href="#" id="gestionarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-layer-forward me-1"></i> Gestionar Tablas
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="gestionarDropdown" style="min-width: 250px;">
                        <li><h6 class="dropdown-header text-uppercase fw-bold text-primary">Personas</h6></li>
                        <li><a class="dropdown-item" href="{{ route('aprendices.index') }}"><i class="bi bi-people me-2"></i> Aprendices</a></li>
                        <li><a class="dropdown-item" href="{{ route('instructores.index') }}"><i class="bi bi-person-badge me-2"></i> Instructores</a></li>
                        <li><a class="dropdown-item" href="{{ route('tiposdocumentos.index') }}"><i class="bi bi-card-heading me-2"></i> Tipos de Documento</a></li>
                        <li><a class="dropdown-item" href="{{ route('eps.index') }}"><i class="bi bi-hospital me-2"></i> EPS</a></li>
                        
                        <li><hr class="dropdown-divider"></li>
                        
                        <li><h6 class="dropdown-header text-uppercase fw-bold text-primary">Formación</h6></li>
                        <li><a class="dropdown-item" href="{{ route('centrosdeformacion.index') }}"><i class="bi bi-building me-2"></i> Centros de Formación</a></li>
                        <li><a class="dropdown-item" href="{{ route('programasdeformacion.index') }}"><i class="bi bi-book me-2"></i> Programas</a></li>
                        <li><a class="dropdown-item" href="{{ route('fichasdecaracterizacion.index') }}"><i class="bi bi-hash me-2"></i> Fichas</a></li>
                        
                        <li><hr class="dropdown-divider"></li>
                        
                        <li><h6 class="dropdown-header text-uppercase fw-bold text-primary">Otros</h6></li>
                        <li><a class="dropdown-item" href="{{ route('entecoformadores.index') }}"><i class="bi bi-briefcase me-2"></i> Ente Coformadores</a></li>
                        <li><a class="dropdown-item" href="{{ route('regionales.index') }}"><i class="bi bi-map me-2"></i> Regionales</a></li>
                        <li><a class="dropdown-item" href="{{ route('rolesadministrativos.index')}}"><i class="bi bi-question-circle me-2"></i> Roles Administrativos</a></li>
                    </ul>
                </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container bg-white p-4 rounded shadow-sm mb-5">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    // Tu script de SweetAlert2 para eliminar
    document.querySelectorAll('.btn-borrar').forEach(boton => {
        boton.addEventListener('click', function(e) {
            e.preventDefault();
            const formulario = this.closest('.form-eliminar');

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esta acción!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33', 
                cancelButtonColor: '#6c757d', 
                confirmButtonText: 'Sí, eliminar registro',
                cancelButtonText: 'Cancelar',
                reverseButtons: true 
            }).then((result) => {
                if (result.isConfirmed) {
                    formulario.submit();
                }
            })
        });
    });
    </script>
</body>
</html>