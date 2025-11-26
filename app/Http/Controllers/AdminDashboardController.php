<?php

namespace App\Http\Controllers;

use App\Models\Terminal;
use App\Models\Hall;
use App\Models\Gate;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'terminalsCount' => Terminal::count(),
            'hallsCount'     => Hall::count(),
            'gatesCount'     => Gate::count(),
        ]);
    }
}
