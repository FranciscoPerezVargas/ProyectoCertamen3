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
            return redirect()->back()->with('error', 'Credenciales inválidas.');
        }
        if ($cuenta->perfil_id !== 1) {
            return redirect()->back()->with('error', 'Acceso no autorizado.');
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


}
