<?php

namespace App\Http\Controllers;

use App\Models\Terminal;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class TerminalController extends Controller
{
    public function index(): View|Factory|Application
    {
        $terminals = Terminal::all();

        return view('terminals.index', compact('terminals'));
    }

    public function create(): View|Factory|Application
    {
        return view('terminals.create');
    }

    public function store(Request $request): RedirectResponse|Redirector
    {
        $data = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:20', 'unique:terminals,code'],
        ]);

        Terminal::create($data);

        return redirect()
            ->route('terminals.index')
            ->with('status', 'Terminal créé avec succès.');
    }
}
