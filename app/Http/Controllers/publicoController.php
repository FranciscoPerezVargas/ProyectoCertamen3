<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagen;
use Illuminate\Support\Facades\Storage;
use App\Models\Cuenta;
class publicoController extends Controller
{
    public function index(){
    $imagenes = Imagen::has('cuenta')->get();
    $cuentas = Cuenta::all();
    return view('publico.index', compact('cuentas','imagenes'));
        
    }
}
