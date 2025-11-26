<?php

namespace App\Http\Controllers;

use App\Models\Terminal;
use Illuminate\Http\Request;

class TerminalController extends Controller
{
    public function index()
    {
        $terminals = Terminal::orderBy('id', 'DESC')->get();

        return view('admin.terminals.index', compact('terminals'));
    }

    public function create()
    {
        return view('admin.terminals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'code' => 'required|string|max:10|unique:terminals,code',
            'emplacement' => 'nullable|string|max:255',
            'date_mise_en_service' => 'nullable|date',
        ]);

        Terminal::create($request->all());

        return redirect()
            ->route('admin.terminals.index')
            ->with('success', 'Terminal créé avec succès.');
    }

    public function edit(Terminal $terminal)
    {
        return view('admin.terminals.edit', compact('terminal'));
    }

    public function update(Request $request, Terminal $terminal)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'code' => 'required|string|max:10|unique:terminals,code,'.$terminal->id,
            'emplacement' => 'nullable|string|max:255',
            'date_mise_en_service' => 'nullable|date',
        ]);

        $terminal->update($request->all());

        return redirect()
            ->route('admin.terminals.index')
            ->with('success', 'Terminal mis à jour.');
    }

    public function destroy(Terminal $terminal)
    {
        $terminal->delete();

        return redirect()
            ->route('admin.terminals.index')
            ->with('success', 'Terminal supprimé.');
    }
}
