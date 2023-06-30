<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagen;
use Illuminate\Support\Facades\Storage;
use App\Models\Cuenta;

class administradorController extends Controller
{
    public function index(Request $request){
        
        $user = $request->user;
        $password = $request->password;
    
        // Verificar si el usuario existe y cumple con las condiciones
        $cuenta = Cuenta::where('user', $user)->first();
        
        if (!$cuenta || $cuenta->password !== $password) {
            return redirect()->back()->withErrors(['error' => 'Credenciales inválidas.']);
        }
        if ($cuenta->perfil_id !== 1) {
            return redirect()->back()->withErrors(['error' => 'Acceso no autorizado.']);
        }
        $cuentasAd = Cuenta::where('perfil_id', 1)->get();
        $cuentasAr = Cuenta::where('perfil_id', 2)->get();
        $cuentas = Cuenta::All();

        $filtro = $request->input('filtro');

        if ($filtro == 1) {
            $cuentas = Cuenta::where('perfil_id', 1)->get();
        } elseif ($filtro == 2) {
            $cuentas = Cuenta::where('perfil_id', 2)->get();
        } else {
            $cuentas = Cuenta::all();
        }

        return view('administrador.index', compact('cuenta', 'cuentas','cuentasAd','cuentasAr','filtro'));
    }
   /* public function store(Request $request)
{
   
    $nuevaCuenta = new Cuenta();

}*/
public function eliminar($user)
{
    $cuenta = Cuenta::where('user', $user)->first();

  
 

    $cuenta->delete();

    
    return redirect()->route('cuenta.index')->with('success', 'La cuenta se ha eliminado correctamente.');
}
public function deleteCuenta($user)
{
    $cuenta = Cuenta::where('user', $user)->first();

    if (!$cuenta) {
        return redirect()->back()->with('error', 'La cuenta no existe.');
    }

    $cuenta->delete();

    return redirect()->back()->with('success', 'La cuenta ha sido eliminada exitosamente.');
}

public function adminArtista($user)
{
    $artista = Cuenta::where('user', $user)->where('perfil_id', 2)->first();
    if (!$artista) {
        return redirect()->back()->withErrors(['error' => 'Artista no encontrado.']);
    }
    $imagenes = Imagen::where('cuenta_user', $user)->get();
    return view('administrador.adminArtista', compact('artista', 'imagenes'));
}
public function banImagen(Imagen $imagen, Request $request)
{
    $imagen->baneada = true;
    $imagen->motivo_ban = $request->input('motivo_ban');
    $imagen->save();

    return redirect()->back()->with('success', 'Imagen baneada exitosamente.');
}
public function desbanImagen($id)
{
    $imagen = Imagen::find($id);
    if (!$imagen) {
        return redirect()->back()->withErrors(['error' => 'Imagen no encontrada.']);
    }
    
    // Desbanear la imagen
    $imagen->baneada = false;
    $imagen->motivo_ban = null;
    $imagen->save();
    
    return redirect()->back()->withSuccess('Imagen desbaneada correctamente.');
}

}
