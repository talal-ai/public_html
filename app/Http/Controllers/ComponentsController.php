<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ComponentsController extends Controller
{
    public function accordions()
    {
        return view('components.accordions');
    }

    public function tabs()
    {
        return view('components.tabs');
    }

    public function modal()
    {
        return view('components.modal');
    }

    public function notification()
    {
        return view('components.notification');
    }

    public function lightbox()
    {
       
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        return view('components.lightbox', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions // Pass allowed permissions to the view
        ]);
    }

    public function swiper()   
    {
        return view('components.swiper');
    }
}
