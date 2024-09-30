<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;

class ElectionController extends Controller
{
    public function viewDivisions($district)
    {
        // Fetch the divisions from the database based on the district
        $divisions = Division::where('district', $district)->get();

        // Return the view and pass the data to the view
        return view('divisions.index', compact('divisions', 'district'));
    }
}
