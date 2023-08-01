<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Method to create a new post
    public function create(Request $request, Website $website)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $post = $website->posts()->create($validatedData);

        // Send an email to subscribers here (will be handled through a command and queue)
        
        return response()->json(['message' => 'Post created successfully', 'post' => $post], 201);
    }
}
