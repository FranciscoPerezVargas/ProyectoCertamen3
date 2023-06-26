@extends('layouts.masterHome')



@yield('contenido-home')
<body>
    

<div class="container-fluid border border-info" >
    <div class="row">
        <div class="col-11">
            <h2 style="text-align: center">Crea tu perfil</h2>
        </div>
        <div class="col-1 text-end">
            <a href="{{ route('home.login') }}" class="btn btn-primary btn-sm">Olvídalo, no quiero nada</a>
        </div>
    </div>
    
   
    @if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
    <form method="POST" action="{{ route('store.crearPerfil') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" name="nombre" id="nombre">
           
        </div>
        <div class="mb-3">
          <label for="user" class="form-label">Usuario</label>
          <input type="text" class="form-control" id="user" name="user">
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido">
          </div>


          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>

        
          <select class="form-select" name="perfil_id" aria-label="Default select example">
            <option selected>Seleccione el tipo de usuario</option>
            <option value="1">Administrador</option>
            <option value="2">Artista</option>
        </select>
        <button type="submit" class="btn btn-primary mt-4 mb-4">Crear Usuario</button>
      </form>
</div>
</body>