@extends('layouts.masterArtista')

@yield('contenido-artista')




<div class="container border border-info mt-4">
    <div class="row">
        <div class="col-md-3 mt-4">
            <img src="ruta-de-la-imagen" alt="Perfil" class="img-fluid rounded-circle">
        </div>
        <div class="col-md-3 mt-4">
            <h4>Nombre del usuario</h4>
        </div>
        <form method="POST" action="{{ route('store.imagen') }}" enctype="multipart/form-data">
            @csrf
        <div class="col-md-5 mt-4">
            <div class="mb-3">
                <label for="cuenta_user" >usuario</label>
                <input type="text" id="cuenta_user" name="cuenta_user" class="form-control">

            </div>
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
                
                <button type ="submit" class="btn btn-success">Agregar Imagen</button>
            </div>
        </div>
    </form>
    </div>



    <div class="row mt-4">
        <div class="col-md-4">
            <div class="image-container">
                <img src="ruta-de-la-imagen" alt="Imagen" class="img-fluid">
            </div>
        </div>
        <div class="col-md-4">
            <div class="image-container">
                <img src="ruta-de-la-imagen" alt="Imagen" class="img-fluid">
            </div>
        </div>
        <div class="col-md-4">
            <div class="image-container">
                <img src="ruta-de-la-imagen" alt="Imagen" class="img-fluid">
            </div>
        </div>
    </div>
  
</div>