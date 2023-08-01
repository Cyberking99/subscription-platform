<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Website;
use App\Jobs\SendPostEmailsJob;
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

        $post = new Post($validatedData);
        $post->website()->associate($website);
        $post->save();

        // Dispatch the job to send emails to subscribers for new posts
        SendPostEmailsJob::dispatch($post);
        
        return response()->json(['message' => 'Post created successfully', 'post' => $post], 201);
    }
}
