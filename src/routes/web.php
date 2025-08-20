<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('formulario');
});
Route::post('/contato', [ContatoController::class, 'store'])->name('contato.store');