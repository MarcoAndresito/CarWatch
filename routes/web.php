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

    // rutas para auto

    Route::resource('car', \App\Http\Controllers\CarController::class);

    // ruta para servicios

    Route::resource('service', \App\Http\Controllers\ServiceController::class);

    // ruta para ordenes

    Route::get('/order', [App\Http\Controllers\OrderController::class, 'index'])
        ->name('order.index');
    Route::post('/order', [App\Http\Controllers\OrderController::class, 'store'])
        ->name('order.store');
    Route::get('/order/create', [App\Http\Controllers\OrderController::class, 'create'])
        ->name('order.create');
    Route::get('/order/{order}/dpf', [App\Http\Controllers\OrderController::class, 'dpf'])
        ->name('order.dpf');
});
