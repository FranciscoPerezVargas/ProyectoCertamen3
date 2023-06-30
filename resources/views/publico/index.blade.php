@extends('layouts.masterPublico')

@yield('contenido-publico')
<div class="container bg-ternary mt-4">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            
           
        
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
        </div>
        <div class="col-xl-1 col-m-12 text-end d-lg-block  m-4">
            <a href="{{route('home.login')}}" class="text-dark">Cerrar Sesión</a>
        </div>
      </nav>

   
</div>
<div class="row mt-4">
    <div class="col-md-12">
        <div class="form-group">
            <label for="filtro-artista">Filtrar por Artista:</label>
            <select class="form-control" id="filtro-artista" onchange="filtrarPorArtista(this.value)">
                <option value="">Todos</option>
                @foreach ($cuentas as $cuenta)
                    <option value="{{ $cuenta->user }}">{{ $cuenta->user }} - {{ $cuenta->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="row mt-4" id="imagenes-container">
    @foreach ($imagenes as $imagen)
        @unless ($imagen->baneada)
            <div class="col-md-4" data-artista="{{ $imagen->cuenta->user}}">
                <div class="row">
                    <h5>Título de imagen: {{ $imagen->titulo }}</h5>
                </div>
                <div class="image-container">
                    <img src="{{ Storage::url($imagen->archivo) }}" alt="{{ $imagen->titulo }}" class="img-fluid">
                </div>
                <div class="row">
                    <p>Usuario: {{ $imagen->cuenta->user }}</p>
                </div>
            </div>
        @endunless
    @endforeach
</div>

<script>
    function filtrarPorArtista(artista) {
        const imagenesContainer = document.getElementById('imagenes-container');
        const imagenes = imagenesContainer.getElementsByClassName('col-md-4');

        for (let i = 0; i < imagenes.length; i++) {
            const imagen = imagenes[i];
            const artistaImagen = imagen.getAttribute('data-artista');

            if (artista && artistaImagen !== artista) {
                imagen.style.display = 'none';
            } else {
                imagen.style.display = 'block';
            }
        }
    }
</script>

