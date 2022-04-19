<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/cliente', [App\Http\Controllers\ClienteController::class, 'index'])->name('cliente');

Route::put('/cliente/editar', [\App\Http\Controllers\ClienteController::class, 'edit'])->name('cliente');

Route::delete('/cliente/eliminar', [\App\Http\Controllers\ClienteController::class, 'delete'])->name('cliente');

Route::post('/cliente/nuevo', [\App\Http\Controllers\ClienteController::class, 'new'])->name('cliente');


Route::resource('Auto',\App\Http\Controllers\AutoController::class);