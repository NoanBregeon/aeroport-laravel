<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Terminal;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class HallController extends Controller
{
    public function index(): View|Factory|Application
    {
        $halls = Hall::with('terminal')->get();

        return view('halls.index', compact('halls'));
    }

    public function create(Request $request): View|Factory|Application
    {
        $terminalId = $request->get('terminal');
        $terminal = $terminalId ? Terminal::findOrFail($terminalId) : null;

        return view('halls.create', compact('terminal'));
    }

    public function store(Request $request): RedirectResponse|Redirector
    {
        $data = $request->validate([
            'terminal_id' => ['required', 'exists:terminals,id'],
            'nom' => ['required', 'string', 'max:255'],
            'personnel_minimum' => ['required', 'integer', 'min:0'],
        ]);

        Hall::create($data);

        return redirect()
            ->route('halls.index')
            ->with('status', 'Hall créé avec succès.');
    }

    public function edit(Hall $hall): View|Factory|Application
    {
        return view('halls.edit', compact('hall'));
    }

    public function update(Request $request, Hall $hall): RedirectResponse|Redirector
    {
        $data = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'personnel_minimum' => ['required', 'integer', 'min:0'],
        ]);

        $hall->update($data);

        return redirect()
            ->route('halls.index')
            ->with('status', 'Hall mis à jour.');
    }

    public function destroy(Hall $hall): RedirectResponse|Redirector
    {
        $hall->delete();

        return redirect()
            ->route('halls.index')
            ->with('status', 'Hall supprimé.');
    }
}
