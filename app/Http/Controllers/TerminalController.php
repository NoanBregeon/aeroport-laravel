<?php

namespace App\Http\Controllers;

use App\Models\Terminal;
use Illuminate\Http\Request;

class TerminalController extends Controller
{
    public function __construct()
    {
        // Protège toutes les routes du contrôleur
        $this->middleware('auth');
    }

    public function index()
    {
        $terminals = Terminal::all();
        return view('terminals.index', compact('terminals'));
    }

    public function create()
    {
        return view('terminals.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:10'],
            'emplacement' => ['required', 'string', 'max:255'],
            'date_mise_en_service' => ['required', 'date'],
        ]);

        Terminal::create($validated);

        return redirect()
            ->route('terminals.index')
            ->with('success', 'Terminal créé avec succès.');
    }
}
