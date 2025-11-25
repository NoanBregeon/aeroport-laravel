<?php

namespace App\Http\Controllers;

use App\Models\Terminal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TerminalController extends Controller
{
    public function __construct()
    {
        // Protège les routes du contrôleur par l'auth
        $this->middleware('auth');
    }

    /**
     * Affiche la liste des terminaux.
     */
    public function index(): View
    {
        $terminals = Terminal::orderBy('name')->get();

        // Doit correspondre à ce qu’attend ton test : 'terminals.index'
        return view('terminals.index', compact('terminals'));
    }

    /**
     * Enregistre un nouveau terminal.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:10', 'unique:terminals,code'],
        ]);

        Terminal::create($validated);

        return redirect()->route('terminals.index');
    }
}
