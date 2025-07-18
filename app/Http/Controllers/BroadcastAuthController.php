<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

class BroadcastAuthController extends Controller
{
    public function authenticate(Request $request)
    {
        if (!Auth::check()) {
            \Log::error('Unauthorized: User not logged in');
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        try {
            \Log::error('Broadcast start');
            return Broadcast::auth($request);
        } catch (\Exception $e) {
            \Log::error('Broadcast auth error: ' . $e->getMessage());
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }
}