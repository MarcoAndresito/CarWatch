<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// ruta inicio

Route::get('/', [\App\Http\Controllers\PageController::class, 'welcome']);

// grupo de rutas bajo autorizacion 

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // ruta de inicio autenticado

    Route::get('/dashboard', [\App\Http\Controllers\PageController::class, 'dashboard'])
        ->name('dashboard');

    // rutas para cliente

    Route::get('/cliente', [App\Http\Controllers\ClienteController::class, 'index'])
        ->name('cliente.index');

    Route::put('/cliente/editar', [\App\Http\Controllers\ClienteController::class, 'edit'])
        ->name('cliente.edit');

    Route::delete('/cliente/eliminar', [\App\Http\Controllers\ClienteController::class, 'delete'])
        ->name('cliente.delete');

    Route::post('/cliente/nuevo', [\App\Http\Controllers\ClienteController::class, 'new'])
        ->name('cliente.new');

    // rutas para auto

    Route::resource('car', \App\Http\Controllers\CarController::class);
});
