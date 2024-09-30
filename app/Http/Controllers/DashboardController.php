<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ElectionResult;

class DashboardController extends Controller
{
    // Show the dashboard with election results
    public function index()
    {
        $electionResults = ElectionResult::with('district', 'division', 'candidate')->get();

        return view('dashboard', compact('electionResults'));
    }
}

