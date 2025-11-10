<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes - Atlantis Project
|--------------------------------------------------------------------------
| Aquí definimos todas las rutas web de la aplicación, incluyendo:
| - Rutas públicas (inicio, propiedades, contactos)
| - Rutas protegidas (crear/editar propiedades, perfil)
| - Autenticación (Laravel Breeze)
|--------------------------------------------------------------------------
*/

// Página principal: listado de propiedades
Route::get('/', [PropertyController::class, 'index'])->name('home');

// Rutas protegidas por autenticación
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // CRUD de propiedades (solo usuarios autenticados)
    Route::resource('properties', PropertyController::class)->except(['index', 'show']);

    // Perfil de usuario (Laravel Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Propiedades públicas (ver listado y detalle)
Route::resource('properties', PropertyController::class)->only(['index', 'show']);

// Contactos / Leads (formulario de contacto)
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Incluye las rutas de autenticación generadas por Breeze
require __DIR__ . '/auth.php';
