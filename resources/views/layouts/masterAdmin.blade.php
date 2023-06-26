

@extends('layouts.masterDeMaster')



@section('contenido-principal')

<div class="container bg-ternary mt-4">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Bienvenido</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              
              <a class="nav-link" href="#">Administrador</a>
              <a class="nav-link" href="#">Pricing</a>
              <a class="nav-link disabled">Disabled</a>
            </div>
          </div>
        </div>
        <div class="col-xl-1 col-m-12 text-end d-lg-block  m-4">
            <a href="{{route('home.login')}}" class="text-dark">Cerrar Sesión</a>
        </div>
      </nav>

   
</div>





    @yield('contenido-admin')
    
    @endsection




