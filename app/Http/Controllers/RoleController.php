<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Rolepermissions;
use Illuminate\Support\Facades\DB;  // Import the DB facade
use App\Models\Yearcreate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RoleController extends Controller
{

    public function getroledata($roleId)
    {
        // Get role data from the 'roles' table
        $role = Role::where('id', $roleId)->first();

        // Fetch all permissions, join with the program table, and group by program_id
        $permissions = Permission::with('program')->get()->groupBy('program_id'); // Group by program_id only

        // Fetch existing role permissions
        $rolePermissions = RolePermissions::where('role_id', $roleId)->pluck('permission_id')->toArray();

        // Prepare the data for response
        $data = [
            'id' => $role->id,
            'name' => $role->name,
            'description' => $role->description,
            'permissions' => $permissions, // Pass structured permissions to the view
            'role_permissions' => $rolePermissions, // Pass the existing role permissions
        ];

        // Return the data as JSON response
        return response()->json($data);
    }

    public function updaterole(Request $request)
    {
        $roleId = $request->input('rolenameid-edit');

        if ($roleId == 1) {
            return redirect()->back()->with('error', 'You cannot edit Super Admin Permission');

        } else {
            // Validate request
            $request->validate([
                'rolename-edit' => 'required|string|max:255',
            ]);

            // Using a transaction to ensure data integrity
            DB::transaction(function () use ($request, $roleId) {
                // Find the role
                $role = Role::findOrFail($roleId);

                // Update the role
                $role->update([
                    'name' => $request->input('rolename-edit'),
                ]);

                // Collect checked permissions
                $permissions = collect(['chkView', 'chkAdd', 'chkModify', 'chkDelete'])
                    ->flatMap(function ($permissionType) use ($request) {
                        return $request->input($permissionType, []);
                    });

                // Delete old role permissions
                Rolepermissions::where('role_id', $roleId)->delete();

                // Insert new role and permission associations
                foreach ($permissions as $permissionId) {
                    Rolepermissions::create([
                        'role_id' => $roleId,
                        'permission_id' => $permissionId,
                    ]);
                }
            });

            return redirect()->back()->with('success', 'Role updated and permissions assigned successfully.');
        }

    }


}
