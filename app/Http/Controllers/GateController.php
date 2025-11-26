<?php

namespace App\Http\Controllers;

use App\Models\Gate;
use App\Models\Hall;
use Illuminate\Http\Request;

class GateController extends Controller
{
    public function index()
    {
        $gates = Gate::with('hall.terminal')->paginate(10);

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
            'hall_id' => 'required|exists:halls,id',
            'nom' => 'required',
            'capacite_max' => 'required|integer|min:1',
        ]);

        Gate::create([
            'hall_id' => $request->hall_id,
            'nom' => $request->nom,
            'capacite_max' => $request->capacite_max,
            'is_open' => $request->boolean('is_open'),
        ]);

        return redirect()->route('admin.gates.index')
            ->with('success', 'Gate créée.');
    }

    public function edit(Gate $gate)
    {
        $halls = Hall::all();

        return view('admin.gates.edit', compact('gate', 'halls'));
    }

    public function update(Request $request, Gate $gate)
    {
        $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'nom' => 'required',
            'capacite_max' => 'required|integer|min:1',
        ]);

        $gate->update([
            'hall_id' => $request->hall_id,
            'nom' => $request->nom,
            'capacite_max' => $request->capacite_max,
            'is_open' => $request->boolean('is_open'),
        ]);

        return redirect()->route('admin.gates.index')
            ->with('success', 'Gate mise à jour.');
    }

    public function destroy(Gate $gate)
    {
        $gate->delete();

        return redirect()->route('admin.gates.index')
            ->with('success', 'Gate supprimée.');
    }
}
