<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DistrictImageController extends Controller
{
    public function create()
    {
        $districts = District::all();
        return view('districts.upload_image', compact('districts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'district_id' => 'required',
            'district_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('district_image')) {
            $fileName = time() . '.' . $request->district_image->extension();
            $request->district_image->move(public_path('uploads/district_images'), $fileName);
            $filePath = 'uploads/district_images/' . $fileName;

            // Save image path to DB under the district
            $district = District::find($request->district_id);
            $district->image = $filePath;
            $district->save();

            return redirect()->route('district-image.create')->with('success', 'Image uploaded successfully!');
        }

        return redirect()->back()->with('error', 'Failed to upload image.');
    }
}

