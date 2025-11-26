<?php

namespace App\Http\Controllers;

use App\Models\Gate;
use App\Models\Hall;
use Illuminate\Http\Request;

class GateController extends Controller
{
    public function index()
    {
        $gates = Gate::with('hall')->paginate(10);

        return view('admin.gates.index', compact('gates'));
    }

    public function create()
    {
        $halls = Hall::all();
        return view('admin.gates.create', compact('halls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|string|max:10|unique:gates,numero',
            'hall_id' => 'required|exists:halls,id',
        ]);

        Gate::create([
            'numero' => $request->numero,
            'hall_id' => $request->hall_id,
        ]);

        return redirect()->route('admin.gates.index')
            ->with('success', 'Gate créé avec succès.');
    }

    public function edit(Gate $gate)
    {
        $halls = Hall::all();
        return view('admin.gates.edit', compact('gate', 'halls'));
    }

    public function update(Request $request, Gate $gate)
    {
        $request->validate([
            'numero' => 'required|string|max:10|unique:gates,numero,' . $gate->id,
            'hall_id' => 'required|exists:halls,id',
        ]);

        $gate->update([
            'numero' => $request->numero,
            'hall_id' => $request->hall_id,
        ]);

        return redirect()->route('admin.gates.index')
            ->with('success', 'Gate mis à jour avec succès.');
    }

    public function destroy(Gate $gate)
    {
        $gate->delete();

        return redirect()->route('admin.gates.index')
            ->with('success', 'Gate supprimé.');
    }
}
