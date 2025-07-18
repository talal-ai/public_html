<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function basic()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        return view('forms.basic', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions // Pass allowed permissions to the view
        ]);
    }

    public function inputGroup()
    {
        return view('forms.inputGroup');
    }

    public function validation()
    {
        return view('forms.validation');
    }

    public function checkbox()
    {
        return view('forms.checkbox');
    }

    public function radio()
    {
        return view('forms.radio');
    }

    public function switches()
    {
        return view('forms.switches');
    }

}
