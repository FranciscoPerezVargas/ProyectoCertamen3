<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagen;
use Illuminate\Support\Facades\Storage;
use App\Models\Cuenta;


class artistaController extends Controller
{
    public function index(Request $request)
{
    $user = $request->user;
    $password = $request->password;
    
    // Verificar si el usuario existe y cumple con las condiciones
    $cuenta = Cuenta::where('user', $user)->first();
    
    if (!$cuenta || $cuenta->password !== $password) {
        return redirect()->back()->withErrors(['error' => 'Credenciales inválidas.']);
    }
    if ($cuenta->perfil_id !== 2) {
        return redirect()->back()->withErrors(['error' => 'Acceso no autorizado.']);
    }
    
    $cuentas = Cuenta::where('perfil_id', 2)->get();
    
    return view('artista.index', compact('cuenta', 'cuentas'));
}



    public function store(Request $request)
    {
    
        $nuevaImagen = new Imagen();
        $nuevaImagen->titulo = $request->titulo;
        $nuevaImagen->baneada = false; 
        $nuevaImagen->cuenta_user = $request->cuenta_user;
        
        $path = $request->archivo->store('imagenes', 'public');
        $nuevaImagen->archivo = $path;

        $nuevaImagen->save();
        
        $cuenta = Cuenta::where('user', $request->cuenta_user)->first();

        $imagenes = $cuenta->imagenes; 

        //return view('artista.index', compact('cuenta','imagenes'));
        return redirect()->route('artista.index');
       
    }



    public function eliminar($id)
{
    $imagen = Imagen::findOrFail($id);
    
    // Eliminar el archivo físico de la imagen si se desea
    Storage::delete($imagen->archivo);
    
    // Eliminar la imagen de la base de datos
    $imagen->delete();
    
    return redirect()->back()->with('success', 'Imagen eliminada correctamente');
}


public function cambiarTitulo(Request $request, $id)
{
    $imagen = Imagen::findOrFail($id);
    $nuevoTitulo = $request->input('nuevo_titulo');
    
    $imagen->titulo = $nuevoTitulo;
    $imagen->save();
    
    return redirect()->back()->with('success', 'Título de imagen cambiado correctamente');
}
}
