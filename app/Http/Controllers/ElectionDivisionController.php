<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\ElectionDivision;

class ElectionDivisionController extends Controller
{
    // Show the form for adding a new election division
    public function create()
    {
        // Fetch all districts to populate the dropdown
        $districts = District::all();
        return view('election-division.create', compact('districts'));
    }

    // Store the election division in the database
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'district_id' => 'required|exists:districts,id', // Ensure the selected district exists
            'division_name' => 'required|string|max:255',
        ]);

        // Save the election division to the database
        ElectionDivision::create([
            'district_id' => $request->district_id,
            'division_name' => $request->division_name,
        ]);

        return redirect()->route('election-division.create')->with('success', 'Election division added successfully.');
    }
    public function showDivisions($district_id)
    {
        // Fetch the district and its election divisions
        $district = District::findOrFail($district_id);
        $divisions = ElectionDivision::where('district_id', $district_id)->get();

        return view('district.divisions', compact('district', 'divisions'));
    }
}
