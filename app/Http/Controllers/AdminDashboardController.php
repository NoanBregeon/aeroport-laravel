<?php

namespace App\Http\Controllers;

use App\Models\Terminal;
use App\Models\Hall;
use App\Models\Gate;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'terminaux' => Terminal::count(),
            'halls'     => Hall::count(),
            'gates'     => Gate::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
