<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class artistaController extends Controller
{
    public function index(){
        
        return view('artista.index');
    }
}
