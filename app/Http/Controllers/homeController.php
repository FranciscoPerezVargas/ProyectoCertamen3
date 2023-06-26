<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagen;
use App\Models\Perfil;
use App\Models\Cuenta;
class homeController extends Controller
{
    public function index(){
        
        return view('home.login');
    }

    public function perfil(){
        return view('home.crearPerfil');
    }

    public function store(Request $request)
    {
        
    
        $nuevaCuenta = new Cuenta();
        $nuevaCuenta->user = $request->user;
        $nuevaCuenta->password = $request->password;
        
        $nuevaCuenta->apellido = $request->apellido;
        // Agregar "A" o "a" al principio de "user" si el perfil es administrador
        if ($request->perfil_id == 1) {
            $nuevaCuenta->user = 'A' . $nuevaCuenta->user;
        }
        if ($request->perfil_id == 2) {
        $nuevaCuenta->user = 'a' . $nuevaCuenta->user;
        }

    
        if (Cuenta::where('user', $nuevaCuenta->user)->exists()) {
            return redirect()->back()->with('error', 'El nombre de usuario ya está en uso.');
        }
        $nuevoPerfil = new Perfil();
        $nuevoPerfil->nombre = $request->nombre;
        $nuevoPerfil->save();
        $nuevaCuenta->perfil_id = $nuevoPerfil->id;
        $nuevaCuenta->nombre = $request->nombre;

        
        
        $nuevaCuenta->save();
    
        return redirect()->route('home.login');
    }
    
    public function loginAdmin(Request $request)
    {
        $user = $request->user;
        $password = $request->password;
        $user = 'A' . $user;
        // Verificar si el usuario existe y cumple con las condiciones
        $cuenta = Cuenta::where('user', $user)->first();
        
        if (!$cuenta || $cuenta->password !== $password) {
            return redirect()->back()->with('error', 'Credenciales inválidas.');
        }
    
        return redirect()->route('administrador.index');
    }
    public function loginArtista(Request $request)
    {
        $user = $request->user;
        $password = $request->password;
        $user = 'a' . $user;
        // Verificar si el usuario existe y cumple con las condiciones
        $cuenta = Cuenta::where('user', $user)->first();
        
        if (!$cuenta || $cuenta->password !== $password) {
            return redirect()->back()->with('error', 'Credenciales inválidas.');
        }
    
        return redirect()->route('artista.index');
    }



}
