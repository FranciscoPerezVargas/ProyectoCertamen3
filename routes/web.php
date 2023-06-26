<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\administradorController;
use App\Http\Controllers\artistaController;
use App\Http\Controllers\publicoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Home
Route::get('/',[homeController::class,'index'])->name('home.login');
Route::get('/homePerfil',[homeController::class,'perfil'])->name('home.crearPerfil');
Route::post('/storePerfil',[homeController::class,'store'])->name('store.crearPerfil');
Route::post('/loginAdmin', [homeController::class, 'loginAdmin'])->name('loginAdmin');
Route::post('/loginArtista', [homeController::class, 'loginArtista'])->name('loginArtista');

//Administrador
Route::get('/administrador',[administradorController::class,'index'])->name('administrador.index');

//Artista
Route::get('/artista',[artistaController::class,'index'])->name('artista.index');
Route::post('/store-imagen', [artistaController::class, 'store'])->name('store.imagen');

//Publico
Route::get('/publico',[publicoController::class,'index'])->name('publico.index');

