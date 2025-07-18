<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Teachercreate;
use App\Models\Sessioncreate;
use App\Models\Programcreate;
use App\Models\Batchcreate;
use App\Models\Devicecreate;
use App\Models\BatchAdditionalInfo;
use App\Models\DeviceAdditionalInfo;
use App\Models\Adminuserscreate;
use App\Models\Faultyuserscreate;
use App\Models\Permission;
use App\Models\CrudPermission;
use App\Models\Yearcreate;
use App\Models\Venuecreate;
use App\Models\Subjectcreate;
use App\Models\Teacheryear;
use App\Models\Teachersubject;
use App\Models\User;
use App\Models\Role;
use App\Models\Studentcreate;
use App\Models\Rolepermissions;
use Illuminate\Support\Facades\DB;  // Import the DB facade


class HomeController extends Controller
{
    public function ecommerce()
    {
        $user = Auth::user();
        return view('home.ecommerce', compact('user'));
    }

    public function accounts()
    {
        return view('home.accounts');
    }

    public function changelog()
    {
        return view('home.changelog');
    }

    public function chart()
    {
        return view('home.chart');
    }

    public function contacts()
    {
        return view('home.contacts');
    }

    public function dragdrop()
    {
        return view('home.dragdrop');
    }

    public function fonticons()
    {
        return view('home.fonticons');
    }

    public function orderlist()
    {
        return view('home.orderlist');
    }

    public function payments()
    {
        return view('home.payments');
    }

    public function profilesetting()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        $data = null; // Initialize $data as null
        if ($user->type == 2) {
            // Fetch data from the students table
            $data = Studentcreate::where('userid', $user->id)->first();
        } elseif ($user->type == 4) {
            // Fetch data from the teachers table
            $data = Teachercreate::where('userid', $user->id)->first();
        } elseif ($user->type == 5) {
            // Fetch data from the teachers table
            $data = Adminuserscreate::where('userid', $user->id)->first();
        } elseif ($user->type == 6) {
            // Fetch data from the teachers table
            $data = Faultyuserscreate::where('userid', $user->id)->first();
        }
        return view('home.profilesetting', [
            'user' => $user,
            'data' => $data,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions // Pass allowed permissions to the view
        ]);
    }

    public function rolessetting()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions

        // Fetch all permissions, join with the program table, and group by program_id
        $permissions = Permission::with('program')
            ->get()
            ->groupBy('program_id'); // Group by program_id only

        $roles = Role::all()->map(function ($session) {
            return [
                'id' => $session->id,
                'name' => $session->name,
                'description' => $session->description,
                'created_at' => $session->created_at,
                'updated_at' => $session->updated_at,
            ];
        });

        return view('home.rolessetting', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
            'permissions' => $permissions, // Pass structured permissions to the view
            'rolesData' => $roles // Pass allowed permissions to the view
        ]);
    }


    public function createrole(Request $request)
    {
        // Validate request
        $request->validate([
            'rolename' => 'required|string|max:255',
        ]);

        // Using a transaction to ensure data integrity
        DB::transaction(function () use ($request) {
            // Create the role
            $role = Role::create([
                'name' => $request->input('rolename'),
            ]);

            // Collect checked permissions
            $permissions = collect(['chkView', 'chkAdd', 'chkModify', 'chkDelete'])
                ->flatMap(function ($permissionType) use ($request) {
                    return $request->input($permissionType, []);
                });

            // Insert role and permission associations
            foreach ($permissions as $permissionId) {
                Rolepermissions::create([
                    'role_id' => $role->id,
                    'permission_id' => $permissionId,
                ]);
            }
        });

        return redirect()->back()->with('success', 'Role created and permissions assigned successfully.');
    }




    public function createaccount()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        return view('home.createaccount', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions // Pass allowed permissions to the view
        ]);
    }

    public function usermanagement()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        // Fetch all permissions, join with the program table, and group by program_id
        $permissions = Permission::with('program')
            ->get()
            ->groupBy('program_id'); // Group by program_id only

        $usersWithadminusers = User::whereIn('type', [5, 6]) // Correctly filter users with type 5 or 6
            ->with(['adminuser', 'faultyuser']) // Eager load both adminuser and faultyuser relationships
            ->get()
            ->map(function ($user) {
                $adminuser = $user->adminuser;
                $faultyuser = $user->faultyuser; // Accessing the faultyuser relationship, if needed
    
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'type' => $user->type,
                    'admin_whatsapp' => $adminuser ? $adminuser->whatsapp : null, // Admin user WhatsApp
                    'admin_designation' => $adminuser ? $adminuser->designation : null, // Admin user designation
                    'faulty_whatsapp' => $faultyuser ? $faultyuser->whatsapp : null, // Faulty user WhatsApp
                    'faulty_designation' => $faultyuser ? $faultyuser->designation : null, // Faulty user designation
                ];
            });
        $roles = Role::all()->map(function ($session) {
            return [
                'id' => $session->id,
                'name' => $session->name,
                'description' => $session->description,
                'created_at' => $session->created_at,
                'updated_at' => $session->updated_at,
            ];
        });
        return view('home.usermanagement', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
            'adminusersData' => $usersWithadminusers, // Pass allowed permissions to the view
            'permissions' => $permissions, // Pass structured permissions to the view
            'rolesData' => $roles, // Pass allowed permissions to the view
        ]);
    }

    public function teachermanagement()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions 
        $allowedPermissionsbtn = $user->permissionss(); // Fetch the user's permissions 
        // Fetch all permissions, join with the program table, and group by program_id
        $permissions = Permission::with('program')
            ->get()
            ->groupBy('program_id'); // Group by program_id only
        // Fetch users with type 4 and their related teacher data
        $usersWithTeachers = User::where('type', 4)
            ->with('teacher') // Eager load the teacher data
            ->get()
            ->map(function ($user) {
                $teacher = $user->teacher;
                $teacherid = $user->id;

                // 1. Find all year_ids from Teacheryear table where teacher_id matches
                $teacheryearIds = Teacheryear::where('userid', $teacherid)->pluck('year_id');

                // 2. Use the year_ids to find the corresponding year names from the Year table
                $yearNames = Yearcreate::whereIn('id', $teacheryearIds)->pluck('name')->toArray();
                $subjectNames = Subjectcreate::whereIn('id', $teacheryearIds)->pluck('name')->toArray();
                $programName = $teacher ? Programcreate::find($teacher->program)->name : null;
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'whatsappnumber' => $teacher ? $teacher->whatsappnumber : null,
                    'latestqualification' => $teacher ? $teacher->latestqualification : null,
                    'pmdcnumber' => $teacher ? $teacher->pmdcnumber : null,
                    'employeeid' => $teacher ? $teacher->employeeid : null,
                    'program' => $programName,
                    'year' => $yearNames,
                    'subject' => $subjectNames,
                ];
            });
        $programs = programcreate::all()->map(function ($program) {
            return [
                'id' => $program->id,
                'name' => $program->name,
                'description' => $program->description,
                'status' => $program->status,
            ];
        });

        $roles = Role::all()->map(function ($session) {
            return [
                'id' => $session->id,
                'name' => $session->name,
                'description' => $session->description,
                'created_at' => $session->created_at,
                'updated_at' => $session->updated_at,
            ];
        });

        $years = yearcreate::all()->map(function ($year) {
            return [
                'id' => $year->id,
                'name' => $year->name,
                'class' => $year->class,
                'code' => $year->code,
                'program' => $year->program,
                'acadamicyear' => $year->acadamicyear,
                'description' => $year->description,
                'status' => $year->status,
            ];
        });

        $subjects = Subjectcreate::all()->map(function ($subject) {
            return [
                'id' => $subject->id,
                'name' => $subject->name,
                'subjectprogram' => $subject->subjectprogram,
                'subjectyear' => $subject->subjectyear,
                'subjecttype' => $subject->subjecttype,
                'description' => $subject->description,
                'status' => $subject->status,
            ];
        });

        return view('home.teachermanagement', [
            'user' => $user,
            'permissions' => $permissions,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
            'allowedPermissionsbtn' => $allowedPermissionsbtn, // Pass allowed permissions to the view
            'userWithTeacherData' => $usersWithTeachers,
            'programsData' => $programs, // Pass allowed permissions to the view
            'rolesData' => $roles, // Pass allowed permissions to the view
            'yearsData' => $years, // Pass allowed permissions to the view
            'subjectsData' => $subjects, // Pass allowed permissions to the view
        ]);
    }

    public function createsession()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions

        $sessions = sessioncreate::all()->map(function ($session) {
            return [
                'id' => $session->id,
                'name' => $session->name,
                'description' => $session->description,
                'status' => $session->status,
            ];
        });
        return view('home.createsession', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
            'sessionsData' => $sessions // Pass allowed permissions to the view
        ]);
    }

    public function createprogram()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        $programs = programcreate::all()->map(function ($program) {
            return [
                'name' => $program->name,
                'description' => $program->description,
                'status' => $program->status,
            ];
        });
        return view('home.createprogram', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
            'programsData' => $programs // Pass allowed permissions to the view
        ]);
    }

    public function createyear()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        $years = yearcreate::all()->map(function ($year) {
            $programName = $year->program ? Programcreate::find($year->program)->name : null;
            $sessionname = $year->acadamicyear ? Sessioncreate::find($year->acadamicyear)->name : null;
            return [
                'name' => $year->name,
                'class' => $year->class,
                'code' => $year->code,
                'program' => $programName,
                'acadamicyear' => $sessionname,
                'description' => $year->description,
                'status' => $year->status,
            ];
        });
        $programs = programcreate::all()->map(function ($program) {
            return [
                'id' => $program->id,
                'name' => $program->name,
                'description' => $program->description,
                'status' => $program->status,
            ];
        });
        $sessions = sessioncreate::all()->map(function ($session) {
            return [
                'id' => $session->id,
                'name' => $session->name,
                'description' => $session->description,
                'status' => $session->status,
            ];
        });
        return view('home.createyear', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
            'yearsData' => $years, // Pass allowed permissions to the view
            'programsData' => $programs, // Pass allowed permissions to the view
            'sessionsData' => $sessions // Pass allowed permissions to the view
        ]);
    }

    public function createbatch()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions

        // Retrieve all batches
        $batches = Batchcreate::all();

        // Prepare the batch details array
        $batchDetails = [];

        foreach ($batches as $batch) {
            // Retrieve additional info for each batch
            $additionalInfos = BatchAdditionalInfo::where('batch_id', $batch->id)->get();

            // Prepare the data for the batch
            $batchData = [
                'id' => $batch->id,
                'name' => $batch->name,
                'code' => $batch->code,
                'description' => $batch->description,
                'status' => $batch->status,
                'additional_info' => []
            ];

            foreach ($additionalInfos as $info) {
                // Retrieve year and program names
                $year = Yearcreate::find($info->year_id);
                $program = Programcreate::find($info->program_id);

                if ($year && $program) {
                    $batchData['additional_info'][] = [
                        'year_id' => $info->year_id,
                        'year_name' => $year->name,
                        'program_id' => $info->program_id,
                        'program_name' => $program->name,
                    ];
                }
            }

            // Add the batch data to the batchDetails array
            $batchDetails[] = $batchData;
        }

        // Prepare years with programs
        $yearsWithPrograms = Yearcreate::with('program')
            ->get()
            ->map(function ($year) {
                $programName = $year->program ? Programcreate::find($year->program)->name : null;
                return [
                    'id' => $year->id,
                    'name' => $year->name,
                    'class' => $year->class,
                    'code' => $year->code,
                    'acadamicyear' => $year->acadamicyear,
                    'description' => $year->description,
                    'status' => $year->status,
                    'program' => $programName,
                    'program_id' => $year->program,
                ];
            });

        // Prepare programs data
        $programs = Programcreate::all()->map(function ($program) {
            return [
                'id' => $program->id,
                'name' => $program->name,
                'description' => $program->description,
                'status' => $program->status,
            ];
        });

        // Pass all data to the view
        return view('home.createbatch', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
            'yearsWithPrograms' => $yearsWithPrograms, // Pass years with programs to the view
            'programsData' => $programs, // Pass programs data to the view
            'batchDetailsData' => $batchDetails, // Pass batch details to the view
            'batches' => $batchDetails, // Pass batches data for Alpine.js
        ]);
    }


    public function createdevice()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions

        // Retrieve all devices
        $devices = Devicecreate::all();

        // Prepare the device details array
        $deviceDetails = [];

        foreach ($devices as $device) {
            // Retrieve additional info for each device
            $additionalInfos = DeviceAdditionalInfo::where('device_id', $device->id)->get();

            // Prepare the data for the device
            $deviceData = [
                'id' => $device->id,
                'name' => $device->name,
                'ipaddress' => $device->ipaddress,
                'status' => $device->status,
                'additional_info' => []
            ];

            foreach ($additionalInfos as $info) {
                // Retrieve venue name
                $venue = Venuecreate::find($info->venue_id);

                if ($venue) {
                    $deviceData['additional_info'][] = [
                        'venue_name' => $venue->name,
                    ];
                }
            }

            // Add the device data to the deviceDetails array
            $deviceDetails[] = $deviceData;
        }


        $venue = Venuecreate::all()->map(function ($venue) {
            return [
                'id' => $venue->id,
                'name' => $venue->name,
                'description' => $venue->description,
                'status' => $venue->status,
            ];
        });
        // Prepare programs data
        $programs = Programcreate::all()->map(function ($program) {
            return [
                'id' => $program->id,
                'name' => $program->name,
                'description' => $program->description,
                'status' => $program->status,
            ];
        });

        // Pass all data to the view
        return view('home.createdevice', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
            'venueData' => $venue, // Pass years with programs to the view
            'programsData' => $programs, // Pass programs data to the view
            'deviceDetailsData' => $deviceDetails, // Pass batch details to the view
            'devices' => $deviceDetails, // Pass batches data for Alpine.js
        ]);
    }


    public function subjectmanagement()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        $programs = Programcreate::all()->map(function ($program) {
            return [
                'id' => $program->id,
                'name' => $program->name,
                'description' => $program->description,
                'status' => $program->status,
            ];
        });
        $years = yearcreate::all()->map(function ($year) {
            return [
                'id' => $year->id,
                'name' => $year->name,
                'class' => $year->class,
                'code' => $year->code,
                'program' => $year->program,
                'acadamicyear' => $year->acadamicyear,
                'description' => $year->description,
                'status' => $year->status,
            ];
        });

        $SubjectWithProgramyear = Subjectcreate::with(['program', 'year']) // Eager load both adminuser and faultyuser relationships
            ->get()
            ->map(function ($user) {
                $program = $user->program;
                $year = $user->year; // Accessing the faultyuser relationship, if needed
    
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'code' => $user->code,
                    'subjecttype' => $user->subjecttype,
                    'description' => $user->description,
                    'status' => $user->status,
                    'programname' => $program ? $program->name : null, // Admin user WhatsApp
                    'yearname' => $year ? $year->name : null, // Faulty user WhatsApp
                ];
            });
        return view('home.subjectmanagement', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
            'SubjectWithProgramyear' => $SubjectWithProgramyear, // Pass years with programs to the view
            'programsData' => $programs, // Pass allowed permissions to the view
            'yearsData' => $years // Pass allowed permissions to the view
        ]);
    }

    public function createvenue()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        $programs = Programcreate::all()->map(function ($program) {
            return [
                'id' => $program->id,
                'name' => $program->name,
                'description' => $program->description,
                'status' => $program->status,
            ];
        });
        $years = yearcreate::all()->map(function ($year) {
            return [
                'id' => $year->id,
                'name' => $year->name,
                'class' => $year->class,
                'code' => $year->code,
                'program' => $year->program,
                'acadamicyear' => $year->acadamicyear,
                'description' => $year->description,
                'status' => $year->status,
            ];
        });
        $venue = Venuecreate::all()->map(function ($venue) {
            return [
                'id' => $venue->id,
                'name' => $venue->name,
                'description' => $venue->description,
                'status' => $venue->status,
            ];
        });
        return view('home.createvenue', [
            'user' => $user,
            'userStatus' => $user->status,
            'allowedPermissions' => $allowedPermissions,
            'programsData' => $programs,
            'yearsData' => $years,
            'venuesData' => $venue,
        ]);
    }


}
