<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;

class DistrictController extends Controller
{
    // Show the form for adding a new district
    public function create()
    {
        return view('district.create');
    }

    // Store the district in the database
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Save the district to the database
        District::create([
            'name' => $request->name,
        ]);

        return redirect()->route('district.create')->with('success', 'District added successfully.');
    }
    public function showDistrict($districtName)
    {
        // Fetch the district by its name or other attribute
        $district = District::where('name', $districtName)->first();

        // Handle cases where district is not found
        if (!$district) {
            abort(404, 'District not found');
        }

        // Pass the district to the view
        return view('districts.show', compact('district'));
    }


}

