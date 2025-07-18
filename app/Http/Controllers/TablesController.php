<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TablesController extends Controller
{
    public function basicTable()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        return view('tables.basicTable', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions // Pass allowed permissions to the view
        ]);
    }

    public function dataTable()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        return view('tables.dataTable', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions // Pass allowed permissions to the view
        ]);
    }

    public function eidtableTable()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        return view('tables.eidtableTable', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions // Pass allowed permissions to the view
        ]);
    }
}
