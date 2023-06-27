@extends('layouts.masterAdmin')

@section('contenido-admin')
<div class="container bg-ternary mt-4">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            
            <a class="navbar-brand" href="#">Bienvenido {{$cuenta->nombre}}</a>
        
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
        </div>
        <div class="col-xl-1 col-m-12 text-end d-lg-block  m-4">
            <a href="{{route('home.login')}}" class="text-dark">Cerrar Sesión</a>
        </div>
      </nav>

   
</div>

<div class="container  border border-5 border-info mt-4 rounded mb-2" style = "height:auto;">
    <div class="row m-2 ">
        <div class="col d-flex justify-content-center align-items-center">
            <h2 style="text-align: center; ">Gestion</h2>
        </div>
        <div class="col">
            <div class="border border-info">

            
            <form>
                <div class="mb-3 mt-2">
                    <h4>Agregar nuevo artista</h4>
                    <div class="row">
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                        </div>
                        <div class="col">
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="exampleInputPassword1" class="form-label mt-2">Password</label>
                        </div>
                        <div class="col">
                            <input type="password" class="form-control mt-2" id="exampleInputPassword1">
                        </div>
                    </div>
                  <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </div>
                  </div>
                  
              
                </div>
                
               
              </form>
            </div>
        </div>
        <div class="col d-flex justify-content-center align-items-center" >
            <button type="button" class="btn btn-lg btn-secondary text-white" style="background-color: rgb(232, 42, 147);">Custom Button</button>
        </div>

      
        
        <body>

            <div class="row mt-4 row-flex">
                <table class="table transparent-table" style="background-color: transparent;">
                    <thead>
                        <tr cla>
                            <th scope="col d-flex">#</th>
                            <th scope="col">User</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Perfiles</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cuentas as $num=>$cuent)
                        <tr>
                            <th scope="row">{{$num}}</th>
                            <td>{{ $cuent->user }}</td>
                            <td>{{$cuent -> nombre}} {{$cuent -> apellido}}</td>
                            <td>hola</td>

                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            
        </body>
        
      
 </div>

    @endsection