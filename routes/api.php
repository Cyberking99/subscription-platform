<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\WebsiteController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Create a new post
Route::post('/websites/{website}/posts', [PostController::class, 'create']);

// User subscribe to a website
Route::post('/websites/{website}/subscribe', [SubscriptionController::class, 'subscribe']);

// Create a new website
Route::post('/websites', [WebsiteController::class, 'create']);
