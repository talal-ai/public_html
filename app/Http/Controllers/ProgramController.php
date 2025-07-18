<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\User;
use App\Models\Programcreate;
use App\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    public function programcreate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        $programcreate = programcreate::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);

        // Fetch all existing permissions
         $permissions = Permission::where('original', 1)->get();

        // Initialize a map to track old parent IDs to new parent IDs
        $oldToNewParentIds = [];

        // Step 1: Duplicate parent permissions (where parent_id is 0)
        foreach ($permissions as $permission) {
            if ($permission->parent_id == 0) {
                // Create a new parent permission
                $newParentPermission = Permission::create([
                    'program_id' => $programcreate->id, // Associate with the new program ID
                    'name' => $permission->name,
                    'description' => $permission->description,
                    'parent_id' => 0, // Parent permissions have parent_id set to 0
                ]);

                // Map old parent permission ID to new parent permission ID
                $oldToNewParentIds[$permission->id] = $newParentPermission->id;
            }
        }

        // Step 2: Duplicate child permissions (where parent_id is not 0)
        foreach ($permissions as $permission) {
            if ($permission->parent_id != 0) {
                // Check if the old parent_id exists in the map
                if (isset($oldToNewParentIds[$permission->parent_id])) {
                    // Create a new child permission with the mapped parent_id
                    Permission::create([
                        'program_id' => $programcreate->id, // Associate with the new program ID
                        'name' => $permission->name,
                        'description' => $permission->description,
                        'parent_id' => $oldToNewParentIds[$permission->parent_id], // Use the new parent ID
                    ]);
                }
            }
        }


        return redirect()->route('createprogram')->with('success', 'Program Succesfully Create');
    }

}
