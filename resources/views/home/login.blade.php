@extends('layouts.masterDeMaster')


@yield('contenido-principal')
<div class="container">
    <h1 style="text-align: center">Bienvenido a no instagram</h1>
    <div class="forms">
        <div class="card">
            <div class="card-header">
                Administrador
            </div>
            <div class="card-body">
                <!-- Formulario 1 Administrador -->
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ingrese Gmail</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <form action="{{ route('administrador.index') }}">   
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                Artista
            </div>
            <div class="card-body">
                <!-- Formulario 2 Artista -->
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ingrese Gmail</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contraseña artisticamente</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <form action="{{ route('artista.index') }}">   
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                Publico
            </div>
            <div class="card-body" style="text-align: center;">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="{{ route('publico.index') }}" class="btn btn-primary btn-lg">Go somewhere</a>
            </div>
        </div>
        
    </div>
</div>