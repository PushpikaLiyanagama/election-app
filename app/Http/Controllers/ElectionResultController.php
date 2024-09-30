<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ElectionResult;
use App\Models\District;
use App\Models\ElectionDivision;
use App\Models\Candidate;

class ElectionResultController extends Controller
{
    // Display the form for creating a new election result
    public function create()
    {
        $districts = District::all();
        $divisions = ElectionDivision::all();
        $candidates = Candidate::all();
        $years = range(date('Y'), 1900); // Generate years starting from the current year down to 1900

        return view('election-results.create', compact('districts', 'divisions', 'candidates', 'years'));
    }

    // Store a newly created election result in the database
    public function store(Request $request)
    {
        $request->validate([
            'district_id' => 'required|exists:districts,id',
            'division_id' => 'required|exists:election_divisions,id',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'candidate_id' => 'required|exists:candidates,id',
            'votes' => 'required|integer|min:0',
        ]);

        ElectionResult::create([
            'district_id' => $request->district_id,
            'division_id' => $request->division_id,
            'year' => $request->year,
            'candidate_id' => $request->candidate_id,
            'votes' => $request->votes,
        ]);

        return redirect()->route('dashboard')->with('success', 'Election result added successfully.');
    }

    // Show the form for editing the specified election result
    public function edit($id)
    {
        $result = ElectionResult::findOrFail($id);
        $districts = District::all();
        $divisions = ElectionDivision::all();
        $candidates = Candidate::all();
        $years = range(date('Y'), 1900);

        return view('election-results.edit', compact('result', 'districts', 'divisions', 'candidates', 'years'));
    }

    // Update the specified election result in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'district_id' => 'required|exists:districts,id',
            'division_id' => 'required|exists:election_divisions,id',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'candidate_id' => 'required|exists:candidates,id',
            'votes' => 'required|integer|min:0',
        ]);

        $result = ElectionResult::findOrFail($id);
        $result->update([
            'district_id' => $request->district_id,
            'division_id' => $request->division_id,
            'year' => $request->year,
            'candidate_id' => $request->candidate_id,
            'votes' => $request->votes,
        ]);

        return redirect()->route('dashboard')->with('success', 'Election result updated successfully.');
    }

    // Delete the specified election result from the database
    public function destroy($id)
    {
        $result = ElectionResult::findOrFail($id);
        $result->delete();

        return redirect()->route('dashboard')->with('success', 'Election result deleted successfully.');
    }
    public function showResults($division_id)
    {
        // Find the division
        $division = ElectionDivision::findOrFail($division_id);
        
        // Fetch all election results for the given division with candidate names
        $results = ElectionResult::with('candidate') // Assuming you have a relationship set up
                                ->where('division_id', $division_id)
                                ->get();

        // Pass the data to the view
        return view('division.results', compact('division', 'results'));
    }


}
