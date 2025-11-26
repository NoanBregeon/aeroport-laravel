<?php

use App\Http\Controllers\GateController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TerminalController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes publiques
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

/*
|--------------------------------------------------------------------------
| Dashboard utilisateur
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profil utilisateur
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Espace Administrateur
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('terminals', TerminalController::class);
        Route::resource('halls', HallController::class);
        Route::resource('gates', GateController::class);
    });

/*
|--------------------------------------------------------------------------
| Auth (Breeze)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [\App\Http\Controllers\AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('terminals', \App\Http\Controllers\TerminalController::class);
        Route::resource('halls', \App\Http\Controllers\HallController::class);
        Route::resource('gates', \App\Http\Controllers\GateController::class);
    });



require __DIR__.'/auth.php';
