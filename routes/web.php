<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\PagoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    // Ruta básica para abrir vistas
    Route::get('/clientes', function () {
        return view('clientes.index');
    })->name('clientes.index'); // Asignamos un nombre a la ruta

    Route::get('/dashboard', function () {
        return view('dashboard'); // Asegúrate de que esta vista exista
    })->name('dashboard'); // 🔹 Nombre asignado a la ruta

    Route::get('/clientes/create', function () {
        return view('clientes.create');
    })->name('clientes.create');

    Route::get('/prestamos', function () {
        return view('prestamos.index');
    })->name('prestamos.index');

    //Ruta para abrir solo vistas
    Route::get('/clientes_menu', function () {
        return view('clientes_menu'); // Asegúrate de que esta vista exista
    })->name('clientes_menu'); // 🔹 Nombre asignado a la ruta

    Route::get('/prestamos_menu', function () {
        return view('prestamos_menu'); 
    })->name('prestamos_menu');

    // Ruta básica
    Route::resource('clientes', ClienteController::class);
    Route::resource('prestamos', PrestamoController::class);

    Route::post('/pagos', [PagoController::class, 'store'])->name('pagos.store');
    Route::delete('/pagos/{pago}', [PagoController::class, 'destroy'])->name('pagos.destroy');
    Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/prestamos/{prestamo}', [PrestamoController::class, 'destroy'])->name('prestamos.destroy');
    Route::put('/prestamos/{prestamo}', [PrestamoController::class, 'update'])->name('prestamos.update');

    Route::get('/prestamos/{prestamo}/contrato', [PrestamoController::class, 'vistaPreviaPDF'])->name('prestamos.vistaPreviaPDF');

    
});

require __DIR__ . '/auth.php';
