<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagen;

class administradorController extends Controller
{
    public function index(){
        
        return view('administrador.index');
    }
   /* public function store(Request $request)
{
   
    $nuevaCuenta = new Cuenta();

}*/


}
