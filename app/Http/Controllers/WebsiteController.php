<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    // Method to add/create a new website
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:websites',
        ]);

        $website = Website::create($validatedData);

        return response()->json(['message' => 'Website created successfully', 'website' => $website], 201);
    }
}
