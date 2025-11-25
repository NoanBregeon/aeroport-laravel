<?php

namespace App\Http\Controllers;

use App\Models\Gate;
use App\Models\Hall;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Affiche la liste des portes.
     */
    public function index(): View
    {
        $gates = Gate::with('hall.terminal')->get();
        $halls = Hall::with('terminal')->get();

        return view('gates.index', [
            'gates' => $gates,
            'halls' => $halls,
        ]);
    }

    /**
     * Crée une porte.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'hall_id'      => ['required', 'exists:halls,id'],
            'nom'          => ['required', 'string', 'max:255'],
            'capacite_max' => ['required', 'integer', 'min:0'],
            'capacite'     => ['required', 'integer', 'min:0'],
            'ouverte'      => ['nullable', 'boolean'],
        ]);

        // checkbox HTML => "on" => on cast en booléen
        $data['ouverte'] = $request->boolean('ouverte');

        Gate::create($data);

        return redirect()
            ->route('gates.index')
            ->with('status', 'Porte créée avec succès.');
    }
}
