<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RepresentanteController;
use App\Http\Controllers\ClienteController;

Route::get('/representantes', [RepresentanteController::class, 'index'])->name('representantes.index');
Route::get('/representantes/create', [RepresentanteController::class, 'create'])->name('representantes.create');
Route::post('/representantes', [RepresentanteController::class, 'store'])->name('representantes.store');
Route::put('/representantes/{representante}', [RepresentanteController::class, 'update'])->name('representantes.update');
Route::delete('/representantes/{representante}', [RepresentanteController::class, 'destroy'])->name('representantes.destroy');
Route::get('/representantes/{representante}/clientes', [RepresentanteController::class, 'clientes'])->name('representantes.clientes');


Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');


Route::get('/', function () {
    return view('index');
});
