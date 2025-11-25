<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TerminalController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\GateController;

Route::get('/', function () {
    return redirect()->route('terminals.index');
})->name('home');

// Terminals
Route::middleware(['auth'])->group(function () {
    Route::get('/terminals', [TerminalController::class, 'index'])->name('terminals.index');
    Route::get('/terminals/create', [TerminalController::class, 'create'])->name('terminals.create');
    Route::post('/terminals', [TerminalController::class, 'store'])->name('terminals.store');

    // Halls
    Route::get('/halls', [HallController::class, 'index'])->name('halls.index');
    Route::get('/halls/create', [HallController::class, 'create'])->name('halls.create');
    Route::post('/halls', [HallController::class, 'store'])->name('halls.store');

    // Gates
    Route::get('/gates', [GateController::class, 'index'])->name('gates.index');
    Route::get('/gates/create', [GateController::class, 'create'])->name('gates.create');
    Route::post('/gates', [GateController::class, 'store'])->name('gates.store');
});

// On choisit que "le dashboard" = la liste des terminaux
Route::get('/dashboard', function () {
    return redirect()->route('terminals.index');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Auth routes (Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
