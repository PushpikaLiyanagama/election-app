<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{
    // Show the form for adding a new candidate
    public function create()
    {
        return view('candidate.create');
    }

    // Store the candidate in the database
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'year' => 'required|integer|min:1900|max:' . date('Y'),  // Validate the year
            'team' => 'required|string|max:255',
            'candidate_name' => 'required|string|max:255',
        ]);

        // Save the candidate to the database
        Candidate::create([
            'year' => $request->year,
            'team' => $request->team,
            'candidate_name' => $request->candidate_name,
        ]);

        return redirect()->route('candidate.create')->with('success', 'Candidate added successfully.');
    }
}
