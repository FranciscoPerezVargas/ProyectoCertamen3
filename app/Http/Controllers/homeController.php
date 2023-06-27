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
        
    
        if (Cuenta::where('user', $nuevaCuenta->user)->exists()) {
            return redirect()->back()->with('error', 'El nombre de usuario ya está en uso.');
        }
       
        $nuevaCuenta->perfil_id = $request->perfil_id;
       
        $nuevaCuenta->nombre = $request->nombre;

        
        
        $nuevaCuenta->save();
    
        return redirect()->route('home.login');
    }
    
    public function loginAdmin(Request $request)
    {
        $user = $request->user;
        $password = $request->password;
    
        // Verificar si el usuario existe y cumple con las condiciones
        $cuenta = Cuenta::where('user', $user)->first();
        
        if (!$cuenta || $cuenta->password !== $password) {
            return redirect()->back()->with('error', 'Credenciales inválidas.');
        }
        if ($cuenta->perfil_id !== 1) {
            return redirect()->back()->with('error', 'Acceso no autorizado.');
        }
        $cuentas = Cuenta::where('perfil_id', 1)->get();
    
        return view('administrador.index', compact('cuenta', 'cuentas'));
    }


    public function loginArtista(Request $request)
    {
        $user = $request->user;
        
        $password = $request->password;
        
        // Verificar si el usuario existe y cumple con las condiciones
        $cuenta = Cuenta::where('user', $user)->first();
        
        if (!$cuenta || $cuenta->password !== $password) {
            return redirect()->back()->with('error', 'Credenciales inválidas.');
        }
        if ($cuenta->perfil_id !== 2) {
            return redirect()->back()->with('error', 'Acceso no autorizado.');
        }
        $cuentas = Cuenta::where('perfil_id', 2)->get();
        
    
        return view('artista.index', compact('cuenta','cuentas'));
    }



}
