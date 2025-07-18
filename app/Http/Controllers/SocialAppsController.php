<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialAppsController extends Controller
{
    public function compose()
    {
        $user = Auth::user(); 
        return view('socialapps.compose', compact('user'));
    }
    
    public function inbox()
    {
        $user = Auth::user(); 
        return view('socialapps.inbox', compact('user'));
    }
    
    public function chat()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        return view('socialapps.chat', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions // Pass allowed permissions to the view
        ]);
    }
}
