@extends('layouts.masterAdmin')

@section('contenido-admin')
<div class="col-xl-1 col-m-12 text-end d-lg-block  m-4">
    <a href="{{route('home.login')}}" class="text-dark">Cerrar Sesión</a>
</div>
<h1>Imágenes del artista: {{ $artista->user }}</h1>
    
<div class="row mt-4" id="imagenes-container">
    @foreach ($imagenes as $imagen)
        <div class="col-md-4" data-artista="{{ $imagen->cuenta->user}}">
            <div class="row">
                <div class="col">
                    @if ($imagen->baneada)
                        <form action="{{ route('admin.desbanImagen', $imagen->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Desbanear Imagen</button>
                        </form>
                    @else
                        <form action="{{ route('admin.banImagen', $imagen->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="motivo_ban" class="form-label">Motivo de ban</label>
                                <input type="text" class="form-control" id="motivo_ban" name="motivo_ban">
                            </div>
                            <button type="submit" class="btn btn-danger">Banear Imagen</button>
                        </form>
                    @endif
                </div>
            </div>
            <div class="row">
                <h5>Título de imagen: {{ $imagen->titulo }}</h5>
            </div>
            <div class="image-container">
                <img src="{{ Storage::url($imagen->archivo) }}" alt="{{ $imagen->titulo }}" class="img-fluid @if ($imagen->baneada) border-red @endif">
            </div>
            <div class="row">
                <p>Usuario: {{ $imagen->cuenta->user }}</p>
            </div>
        </div>
    @endforeach
</div>
