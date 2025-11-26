<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Terminal;
use Illuminate\Http\Request;

class HallController extends Controller
{
    public function index()
    {
        $halls = Hall::with('terminal')->get();

        return view('admin.halls.index', compact('halls'));
    }

    public function create()
    {
        $terminals = Terminal::all();

        return view('admin.halls.create', compact('terminals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'terminal_id' => 'required|exists:terminals,id',
            'nom' => 'required',
            'min_personnel' => 'required|integer|min:0',
        ]);

        Hall::create($request->all());

        return redirect()->route('admin.halls.index')
            ->with('success', 'Hall créé.');
    }

    public function edit(Hall $hall)
    {
        $terminals = Terminal::all();

        return view('admin.halls.edit', compact('hall', 'terminals'));
    }

    public function update(Request $request, Hall $hall)
    {
        $request->validate([
            'terminal_id' => 'required|exists:terminals,id',
            'nom' => 'required',
            'min_personnel' => 'required|integer|min:0',
        ]);

        $hall->update($request->all());

        return redirect()->route('admin.halls.index')
            ->with('success', 'Hall mis à jour.');
    }

    public function destroy(Hall $hall)
    {
        $hall->delete();

        return redirect()->route('admin.halls.index')
            ->with('success', 'Hall supprimé.');
    }
}
