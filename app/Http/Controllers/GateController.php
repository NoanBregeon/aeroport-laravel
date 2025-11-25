<?php

namespace App\Http\Controllers;

use App\Models\Gate;
use App\Models\Hall;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class GateController extends Controller
{
    public function index(): View|Factory|Application
    {
        $gates = Gate::with('hall')->get();

        return view('gates.index', compact('gates'));
    }

    public function create(Request $request): View|Factory|Application
    {
        $hallId = $request->get('hall');
        $hall = $hallId ? Hall::findOrFail($hallId) : null;

        return view('gates.create', compact('hall'));
    }

    public function store(Request $request): RedirectResponse|Redirector
    {
        $data = $request->validate([
            'hall_id' => ['required', 'exists:halls,id'],
            'nom' => ['required', 'string', 'max:255'],
            'ouverte' => ['required', 'boolean'],
            'capacite_max' => ['nullable', 'integer', 'min:0'],
            'capacite' => ['nullable', 'integer', 'min:0'],
        ]);

        Gate::create($data);

        return redirect()->route('gates.index')->with('status', 'Gate créé.');
    }
}
