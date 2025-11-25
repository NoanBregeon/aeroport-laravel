<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Terminal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HallController extends Controller
{
    public function __construct()
    {
        // tu peux ajouter 'auth' si les tests agissent en utilisateur connecté
        $this->middleware('auth');
    }

    /**
     * Affiche la liste des halls.
     */
    public function index(): View
    {
        $halls = Hall::with('terminal')->get();
        $terminals = Terminal::all();

        return view('halls.index', [
            'halls'     => $halls,
            'terminals' => $terminals,
        ]);
    }

    /**
     * Crée un hall.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'terminal_id'       => ['required', 'exists:terminals,id'],
            'nom'               => ['required', 'string', 'max:255'],
            'personnel_minimum' => ['required', 'integer', 'min:0'],
        ]);

        Hall::create($data);

        return redirect()
            ->route('halls.index')
            ->with('status', 'Hall créé avec succès.');
    }
}
