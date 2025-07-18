<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\User;
use App\Models\Sessioncreate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SessionController extends Controller
{
    public function sessioncreate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        $sessioncreate = sessioncreate::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('createsession')->with('success', 'Session Succesfully Create');
    }

    public function sessionupdate(Request $request)
    {
        $sessionID = $request->input('sessionID-edit');
        $request->validate([
            'name-edit' => 'required',
            'description-edit' => 'required',
        ]);
        // Retrieve the User and update its data
        $session = sessioncreate::findOrFail($sessionID);
        $session->name = $request->input('name-edit');
        $session->description = $request->input('description-edit');
        $session->status = $request->input('status');

        $session->save(); // Save user data

        return redirect()->route('createsession')->with('success', 'Session Succesfully Updated');
    }

    public function getsessiondata($sessionId)
    {
        // Get user data from the 'users' table
        $session = sessioncreate::where('id', $sessionId)->first();

        // Prepare the data for response
        $data = [
            'id' => $session->id,
            'name' => $session->name,
            'description' => $session->description,
            'status' => $session->status,
        ];

        // Return the data as JSON response
        return response()->json($data);
    }

}
