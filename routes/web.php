<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\ActorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('inicio', function(){
    return view('inicio');
});

Route::get('/', function () {
    return view('inicio');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('review', ReviewController::class)->middleware('auth');

Route::post('pelicula/{pelicula}/agregar-actor', [PeliculaController::class, 'agregarActor'])->name('pelicula.agregar-actor');
Route::post('pelicula/{pelicula}/nuevo-actor', [PeliculaController::class, 'nuevoActor'])->name('pelicula.nuevo-actor');
Route::get('pelicula/mispeliculas', [PeliculaController::class, 'mispeliculas'])->name('pelicula.mispeliculas')->middleware('auth');
Route::resource('pelicula', PeliculaController::class);

Route::resource('actor', ActorController::class)->middleware('auth');

