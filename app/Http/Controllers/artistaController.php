<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagen;
use Illuminate\Support\Facades\Storage;
use App\Models\Cuenta;


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
        
        $path = $request->archivo->store('imagenes', 'public');
        $nuevaImagen->archivo = Storage::url($path);

        

        $nuevaImagen->save();
        
        $cuenta = Cuenta::where('user', $request->cuenta_user)->first();

        $imagenes = $cuenta->imagenes; 

        return view('artista.index', compact('cuenta','imagenes'));
        
    }

}
