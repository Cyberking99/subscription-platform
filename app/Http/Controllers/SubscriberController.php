<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    // Method for a user to subscribe to a particular website
    public function subscribe(Request $request, Website $website)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|max:255|unique:subscribers,email,NULL,id,website_id,' . $website->id,
        ]);

        $subscriber = $website->subscribers()->create($validatedData);

        return response()->json(['message' => 'Subscription successful', 'subscriber' => $subscriber], 201);
    }
}
