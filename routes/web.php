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
//Route::post('/loginAdmin', [homeController::class, 'loginAdmin'])->name('loginAdmin');
//Route::post('/loginArtista', [homeController::class, 'loginArtista'])->name('loginArtista');

//Administrador
Route::get('/administrador',[administradorController::class,'index'])->name('administrador.index');

//Artista
Route::get('/artista',[artistaController::class,'index'])->name('artista.index');
Route::post('/artistaStore', [artistaController::class, 'store'])->name('artista.store');

//Publico
Route::get('/publico',[publicoController::class,'index'])->name('publico.index');

Route::delete('/imagen/{id}/eliminar', [artistaController::class,'eliminar'])->name('imagen.eliminar');
Route::post('/imagen/{id}/cambiar-titulo', [artistaController::class,'cambiarTitulo'])->name('imagen.cambiar-titulo');
