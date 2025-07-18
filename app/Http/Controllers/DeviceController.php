<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\User;
use App\Models\Userroles;
use App\Models\Devicecreate;
use App\Models\Programcreate;
use App\Models\Yearcreate;
use App\Models\Videocreate;
use App\Models\Teachercreate;
use App\Models\Subjectcreate;
use App\Models\Venuecreate;
use App\Models\Teacheryear;
use App\Models\DeviceAdditionalInfo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DeviceController extends Controller
{

    public function devicecreate(Request $request)
    {
        // Log incoming request data
        \Log::info('Incoming request data:', $request->all());

        // Validate the incoming request
        $request->validate([
            'devicename' => 'required',
            'ipaddress' => 'required',
            'selected_data' => 'required|json'
        ]);

        // Create a new batch entry with input values
        $device = Devicecreate::create([
            'name' => $request->input('devicename'),
            'ipaddress' => $request->input('ipaddress'),
            'status' => $request->input('status'),
        ]);

        $deviceId = $device->id; // Get the ID of the newly created batch

        // Process each item and insert into `batches_additional_info`
        $selectedData = json_decode($request->input('selected_data'), true);

        // Log the decoded selected data
        \Log::info('Decoded selected data:', $selectedData);

        foreach ($selectedData as $item) {
            // Check that batch_id is included in the array
            \Log::info('Inserting with batch_id:', ['batch_id' => $deviceId, 'venue_id' => $item['venue_id']]);

            DeviceAdditionalInfo::create([
                'device_id' => $deviceId,
                'venue_id' => $item['venue_id'],
            ]);
        }

        // Redirect or return a response
        return redirect()->route('createdevice')->with('success', 'Device Successfully Created');
    }

    public function createattendance()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
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

        if ($user->type == 4) {
            // Get the program ID from the teacher's record
            $teacher = Teachercreate::where('userid', $user->id)->first(); // Assuming 'userid' is used to relate teachers to users

            if ($teacher) {
                // Get the program based on the program ID from the teacher's record
                $program = Programcreate::where('id', $teacher->program)->first();

                if ($program) {
                    $programs = [
                        [
                            'id' => $program->id,
                            'name' => $program->name,
                            'description' => $program->description,
                            'status' => $program->status,
                        ],
                    ];
                } else {
                    $programs = []; // No program found for the teacher
                }
            } else {
                $programs = []; // No teacher record found
            }
        } else {
            // For users who are not type 4, return all programs
            $programs = Programcreate::all()->map(function ($program) {
                return [
                    'id' => $program->id,
                    'name' => $program->name,
                    'description' => $program->description,
                    'status' => $program->status,
                ];
            });
        }

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

        $attendance = DB::table('attendance')
        ->join('programs', 'attendance.programid', '=', 'programs.id')
        ->join('years', 'attendance.yearid', '=', 'years.id')
        ->join('batches', 'attendance.batchid', '=', 'batches.id')
        ->join('subjects', 'attendance.subjectid', '=', 'subjects.id')
        ->join('venues', 'attendance.venueid', '=', 'venues.id')
        ->join('users as teacher', 'attendance.assigntoteacherid', '=', 'teacher.id')  // Alias "teacher"
        ->join('users as coteacher', 'attendance.coteacherid', '=', 'coteacher.id')  // Alias "coteacher"
        ->join('users as createdby', 'attendance.createby', '=', 'createdby.id')  // Alias "coteacher"
        ->select(
            'attendance.*',
            'programs.name as program_name',
            'years.name as year_name',
            'batches.name as batch_name',
            'subjects.name as subject_name',
            'venues.name as venue_name',
            'teacher.name as teacher_name',  // Teacher alias
            'coteacher.name as coteacher_name',  // Co-Teacher alias
            'createdby.name as createdby_name'  // Co-Teacher alias
        )
        ->get();

        // Pass all data to the view
        return view('attendance.createattendance', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
            'programsData' => $programs, // Pass allowed permissions to the view
            'yearsData' => $years, // Pass allowed permissions to the view
            'subjectsData' => $subjects, // Pass allowed permissions to the view
            'venueData' => $venue, // Pass years with programs to the view
            'attendancedata' => $attendance, // Pass years with programs to the view
        ]);
    }





}
