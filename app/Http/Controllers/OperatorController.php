<?php

namespace App\Http\Controllers;

use App\Models\Gate;
use App\Models\Hall;
use App\Models\Terminal;

class OperatorController extends Controller
{
    public function dashboard()
    {
        return view('operator.dashboard', [
            'terminals' => Terminal::all(),
            'halls' => Hall::all(),
            'gates' => Gate::all(),
        ]);
    }
}
