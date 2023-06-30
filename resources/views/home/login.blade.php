@extends('layouts.masterHome')



@yield('contenido-home')
<body>
<div class="container-fluid">
    <div class="row">
        
        <div class="col-12 text-end">
            <a href="{{ route('home.crearPerfil') }}" class="btn btn-primary btn-xl">Crea tu perfil</a>
        </div>
    </div>
</div>
    
<div class="container" >
    
    <h1 style="text-align: center">Bienvenido a no instagram</h1>
    
    <div class="forms">
        <!-- Formulario 1 Administrador -->
    <div class="card">
        <div class="card-header">
            Administrador
        </div>
        <div class="card-body">
            @php $errors = session('errors') ?? null; @endphp

            <form action="{{ route('administrador.index') }}" method="GET">
                @csrf
                <div class="mb-3">
                    <label for="user" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="user" name="user">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Iniciar sesión</button>
                </div>
            </form>
            
            @if ($errors && $errors->any())
                <div class="alert alert-danger mt-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
        </div>
    </div>

        <!-- Formulario 2 Artista -->
        <div class="card">
            <div class="card-header">
                Artista
            </div>
            <div class="card-body">
                @php $errorsAr = session('errors') ?? null; @endphp
            
                <form action="{{ route('artista.index') }}" method="GET">
                    @csrf
                    <div class="mb-3">
                        <label for="user" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="user" name="user">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Iniciar sesión</button>
                    </div>
                </form>
                
                @if ($errorsAr && $errorsAr->any())
                    <div class="alert alert-danger mt-4">
                        <ul>
                            @foreach ($errorsAr->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
            
        
        <div class="card">
            <div class="card-header">
                Publico
            </div>
            <div class="card-body" style="text-align: center;">
                <h5 class="card-title">Entra gratis sin registro</h5>
                <p class="card-text">si no entonces no</p>
                <a href="{{ route('publico.index') }}" class="btn btn-primary btn-lg">Ver imagenes de los artistas</a>
            </div>
        </div>
        
    </div>
</div>
</body>