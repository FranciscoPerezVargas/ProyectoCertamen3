@extends('layouts.masterArtista')

@section('contenido-artista')

<div class="container border border-info mt-4">
    <div class="col-xl-1 col-m-12 text-end d-lg-block  m-4">
        <a href="{{route('home.login')}}" class="text-dark">Cerrar Sesión</a>
    </div>
    <form method="POST" action="{{ route('artista.store') }}" enctype="multipart/form-data">
        @csrf
        
    <div class="row">
        <div class="col-md-3 mt-4">
            <img src="ruta-de-la-imagen" alt="Perfil" class="img-fluid rounded-circle">
        </div>
        <div class="col-md-3 mt-4">
            <label for="cuenta_user" class="form-label">{{ $cuenta->user }}</label>
            <input type="hidden" name="cuenta_user" value="{{ $cuenta->user }}">
        </div>
        <div class="col-md-5 mt-4">
            <div class="row">
                <div class="col-md-4">
                    <label for="titulo" class="form-label">Titulo de la imagen</label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="titulo" name="titulo">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <div class="form-group">
                        <label for="archivo">Imagen:</label>
                        <input type="file" id="archivo" name="archivo" class="form-control-file">
                    </div>
                </div>
            </div>
            <div class="mb-3 d-lg-block">
                <button type="submit" class="btn btn-success">Agregar Imagen</button>
            </div>
        </div>
    </div>
    </form>
    <div class="row mt-4">
        @foreach($cuenta->imagenes as $imagen)
            <div class="col-md-4">
                <div class="row">
                    <h5>Titulo de imagen:{{ $imagen->titulo }} </h5>
                </div>
                <div class="image-container">
                    <img src="{{ Storage::url($imagen->archivo) }}" alt="{{ $imagen->titulo }}" class="img-fluid">
                    
                </div>
                <div class="row">
                    <form action="{{ route('imagen.eliminar', $imagen->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar imagen</button>
                    </form>
                </div>
                <div class="row">
                    <form action="{{ route('imagen.cambiar-titulo', $imagen->id) }}" method="POST">
                        @csrf
                        <input type="text" name="nuevo_titulo" placeholder="Nuevo título">
                        <button type="submit">Cambiar título</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection