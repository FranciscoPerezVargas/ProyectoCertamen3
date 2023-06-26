<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagen;

class artistaController extends Controller
{
    public function index(){
        
        return view('artista.index');
    }


    public function store(Request $request)
{
   
    $nuevaImagen = new Imagen();
    $nuevaImagen->titulo = $request->titulo;
    $nuevaImagen->baneada = false; 
    $nuevaImagen->cuenta_user = $request->cuenta_user;
    
    $nuevaImagen->archivo = $request->archivo->store('public/imagenes');

   
    $nuevaImagen->save();

    return redirect()->route('artista.index');
}

}
