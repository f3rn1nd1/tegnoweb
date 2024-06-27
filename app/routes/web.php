<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LeyLobbyController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\OfertaController;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('clientes', ClienteController::class)->names('clientes');
Route::resource('servicios', ServicioController::class)->names('servicios');
Route::resource('categorias', CategoriaController::class)->names('categorias');
Route::resource('ofertas', OfertaController::class)->names('ofertas');
//CALENDARIO DE CITAS
Route::get('calendario',[CalendarController::class,'calendar'])->name('calendario.index');
Route::post('calendario',[CalendarController::class,'store'])->name('calendario.store');
Route::patch('calendario/update/{id}',[CalendarController::class,'update'])->name('calendario.update');
Route::delete('calendario/destroy/{id}',[CalendarController::class,'destroy'])->name('calendario.destroy');