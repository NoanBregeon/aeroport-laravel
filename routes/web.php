<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\GateController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TerminalController;
use Illuminate\Support\Facades\Route;

// ---------------------------------------------------
// Page publique
// ---------------------------------------------------
Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

// ---------------------------------------------------
// Dashboard utilisateur connecté
// ---------------------------------------------------
Route::get('/dashboard', function () {

    // Pas connecté → Jetstream s’occupe d'envoyer vers login
    if (! auth()->check()) {
        return redirect()->route('login');
    }

    $user = auth()->user();

    // Admin
    if ($user->is_admin) {
        return redirect()->route('admin.dashboard');
    }

    // Operator
    if ($user->is_operator) {
        return redirect()->route('operator.dashboard');
    }

    // Aucun rôle valide
    abort(403);
})->name('dashboard');

// ---------------------------------------------------
// Switch de langue
// ---------------------------------------------------
Route::post('/lang', function () {

    $locale = request('locale');

    if (! in_array($locale, ['fr', 'en'])) {
        abort(400, 'Langue non supportée');
    }

    session(['locale' => $locale]);

    if (auth()->check()) {
        auth()->user()->update(['locale' => $locale]);
    }

    return back();

})->name('lang.switch');

// ---------------------------------------------------
// Routes du PROFIL (fix réel du bug "profile.edit")
// ---------------------------------------------------
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// ---------------------------------------------------
// ADMIN AREA
// ---------------------------------------------------
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Redirection auto /admin → /admin/dashboard
        Route::get('/', fn () => redirect()->route('admin.dashboard'))->name('home');

        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        // CRUD terminaux / halls / gates
        Route::resource('terminals', TerminalController::class);
        Route::resource('halls', HallController::class);
        Route::resource('gates', GateController::class);
    });

// ---------------------------------------------------
// OPERATOR AREA
// ---------------------------------------------------
Route::middleware(['auth', 'operator'])
    ->prefix('operator')
    ->name('operator.')
    ->group(function () {

        // Dashboard opérateur
        Route::get('/dashboard', [OperatorController::class, 'dashboard'])
            ->name('dashboard');

        // Changer l’état d’une porte
        Route::patch('/gates/{gate}/toggle', [OperatorController::class, 'toggleGate'])
            ->name('gates.toggle');

        // Modifier personnel minimum hall
        Route::patch('/halls/{hall}/personnel', [OperatorController::class, 'updateHallPersonnel'])
            ->name('halls.personnel');
    });

require __DIR__.'/auth.php';
