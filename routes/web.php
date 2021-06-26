<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\ActorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('inicio', function(){
    return view('inicio');
});

Route::get('/', function () {
    return view('inicio');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('pelicula/{pelicula}/agregar-actor', [PeliculaController::class, 'agregarActor'])->name('pelicula.agregar-actor');
Route::post('pelicula/{pelicula}/nuevo-actor', [PeliculaController::class, 'nuevoActor'])->name('pelicula.nuevo-actor');
Route::get('pelicula/mispeliculas', [PeliculaController::class, 'mispeliculas'])->name('pelicula.mispeliculas')->middleware('auth', 'verified');
Route::resource('pelicula', PeliculaController::class)->middleware('verified');

Route::resource('actor', ActorController::class)->middleware('auth');

Route::resource('review', ReviewController::class)->middleware('auth');

