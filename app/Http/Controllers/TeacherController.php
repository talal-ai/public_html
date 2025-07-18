<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\User;
use App\Models\Userroles;
use App\Models\Teachercreate;
use App\Models\Programcreate;
use App\Models\Teacheryear;
use App\Models\Teachersubject;
use App\Models\Teacherdesination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    public function createteacher(Request $request)
    {
        $request->validate([
            'fullnameteacher' => 'required',
            'email' => 'required',
            'password' => 'required',
            'whatsappnumber' => 'required',
            'latestqualification' => 'required',
            'pmdcnumber' => 'required',
            'employeeid' => 'required',
            'program' => 'required',
            'rolename' => 'required',
        ]);
        $email = $request->input('email');
        if (User::where('email', $email)->exists()) {
            return redirect()->route('teachermanagement')->with('error', 'Teacher Already Created');
        } else {
            $type = 4;
            // $password = Str::upper(Str::random(2)) . Str::lower(Str::random(4)) . Str::random(2);
            $user = User::create([
                'name' => $request->input('fullnameteacher'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'type' => $type,
            ]);
            $insertedId = $user->id;
            $teachercreate = teachercreate::create([
                'userid' => $insertedId,
                'latestqualification' => $request->input('latestqualification'),
                'pmdcnumber' => $request->input('pmdcnumber'),
                'whatsappnumber' => $request->input('whatsappnumber'),
                'employeeid' => $request->input('employeeid'),
                'program' => $request->input('program'),
            ]);
            $years = $request->input('years');

            if ($years) {
                foreach ($years as $yearId) {

                    teacheryear::create([
                        'userid' => $insertedId,
                        'year_id' => $yearId,
                    ]);
                }
            }

            $desinations = $request->input('desination');

            if ($desinations) {
                foreach ($desinations as $desinationId) {

                    Teacherdesination::create([
                        'teacherid' => $insertedId,
                        'designationid' => $desinationId,
                    ]);
                }
            }


            $subjects = $request->input('subject');

            if ($subjects) {
                foreach ($subjects as $subjectId) {

                    teachersubject::create([
                        'userid' => $insertedId,
                        'subject_id' => $subjectId,
                    ]);
                }
            }
            $userroles = Userroles::create([
                'user_id' => $insertedId,
                'role_id' => $request->input('rolename'),
            ]);


            return redirect()->route('teachermanagement')->with('success', 'Teacher Succesfully Create');
        }

    }



    public function updateteacher(Request $request)
    {
        $teacherId = $request->input('teacherID-edit');
        // Validation
        $request->validate([
            'fullnameteacher-edit' => 'required',
            'email-edit' => 'required',
            'password-edit' => 'nullable',  // Password is optional on update
            'whatsappnumber-edit' => 'required',
            'latestqualification-edit' => 'required',
            'pmdcnumber-edit' => 'required',
            'employeeid-edit' => 'required',
            'program-edit' => 'required',
            'rolename-edit' => 'required',
        ]);

        // Retrieve the User and update its data
        $user = User::findOrFail($teacherId);
        $user->name = $request->input('fullnameteacher-edit');
        $user->email = $request->input('email-edit');

        // Only update the password if provided
        if ($request->input('password-edit')) {
            $user->password = Hash::make($request->input('password-edit'));
        }

        $user->save(); // Save user data

        // Retrieve the teachercreate record and update its data
        $teachercreate = teachercreate::where('userid', $teacherId)->first();
        if ($teachercreate) {
            $teachercreate->latestqualification = $request->input('latestqualification-edit');
            $teachercreate->pmdcnumber = $request->input('pmdcnumber-edit');
            $teachercreate->whatsappnumber = $request->input('whatsappnumber-edit');
            $teachercreate->employeeid = $request->input('employeeid-edit');
            $teachercreate->program = $request->input('program-edit');
            $teachercreate->save();
        }

        // Update years (first delete existing years, then insert the new ones)
        teacheryear::where('userid', $teacherId)->delete(); // Clear existing years
        $years = $request->input('years-edit');
        if ($years) {
            foreach ($years as $yearId) {
                teacheryear::create([
                    'userid' => $teacherId,
                    'year_id' => $yearId,
                ]);
            }
        }

        // Update desination (first delete existing desination, then insert the new ones)
        Teacherdesination::where('teacherid', $teacherId)->delete(); // Clear existing desination
        $desinations = $request->input('desination-edit');
        if ($desinations) {
            foreach ($desinations as $desinationId) {
                teacherdesination::create([
                    'teacherid' => $teacherId,
                    'designationid' => $desinationId,
                ]);
            }
        }

        // Update subjects (first delete existing subjects, then insert the new ones)
        teachersubject::where('userid', $teacherId)->delete(); // Clear existing subjects
        $subjects = $request->input('subject');
        if ($subjects) {
            foreach ($subjects as $subjectId) {
                teachersubject::create([
                    'userid' => $teacherId,
                    'subject_id' => $subjectId,
                ]);
            }
        }

        // Update user role
        $userrole = Userroles::where('user_id', $teacherId)->first();
        if ($userrole) {
            $userrole->role_id = $request->input('rolename-edit');
            $userrole->save();
        }

        return redirect()->route('teachermanagement')->with('success', 'Teacher Successfully Updated');
    }


    public function getteacherdata($teacherId)
    {
        // Get user data from the 'users' table
        $user = User::where('id', $teacherId)->first();

        // Get teacher-specific data from the 'teachercreate' table
        $teacher = Teachercreate::where('userid', $teacherId)->first();

        // Get year IDs associated with the teacher from 'teacheryear' table
        $teacheryears = Teacheryear::where('userid', $teacherId)->pluck('year_id')->toArray();


        $teacherdesinations = Teacherdesination::where('teacherid', $teacherId)->pluck('designationid')->toArray();

        // Get subject IDs associated with the teacher from 'teachersubject' table
        $teachersubjects = Teachersubject::where('userid', $teacherId)->pluck('subject_id')->toArray();

        // Assuming program ID is stored in the teachercreate table, fetch the program name
        $programName = Programcreate::where('id', $teacher->program ?? null)->value('id');
        $userroles = Userroles::where('user_id', $teacherId)->first();

        // Prepare the data for response
        $data = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'whatsappnumber' => $teacher ? $teacher->whatsappnumber : null,
            'latestqualification' => $teacher ? $teacher->latestqualification : null,
            'pmdcnumber' => $teacher ? $teacher->pmdcnumber : null,
            'employeeid' => $teacher ? $teacher->employeeid : null,
            'program' => $programName,
            'years' => $teacheryears,
            'teacherdesinations' => $teacherdesinations,
            'subjects' => $teachersubjects,
            'userroles' => $userroles,
        ];

        // Return the data as JSON response
        return response()->json($data);
    }


}
