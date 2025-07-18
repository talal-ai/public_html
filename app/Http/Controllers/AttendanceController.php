<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use App\Models\Studentcreate;
use App\Models\Attendance;
use App\Models\AttendanceAdditionalinfo;
use App\Models\Rolepermissions;
use App\Models\Programcreate;
use Illuminate\Support\Facades\DB;  // Import the DB facade


class AttendanceController extends Controller
{
    public function createdevice()
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
        return view('home.createdevice', [
            'user' => $user,
            'userStatus' => $user->status,
            'allowedPermissions' => $allowedPermissions,
            'programsData' => $programs,
        ]);
    }
    public function machineattendance(Request $request)
    {
        // Data ko receive karna
        $selectProgram = $request->input('selectprogram');
        $selectYear = $request->input('selectyear');
        $selectBatch = $request->input('selectbatch');
        $selectSubject = $request->input('selectsubject');
        $lectureType = $request->input('lecturetype');
        $selectVune = $request->input('selectvune');
        $selectTeacher = $request->input('selectteacher');
        $coTeacher = $request->input('coteacher');
        $reason = $request->input('reason');
        $dateRangePicker = $request->input('daterangepicker');
        $timePickerStart = $request->input('timepickerstart');
        $timePickerEnd = $request->input('timepickerend');
        $deviceid = $request->input('deviceid');
        $createdBy = auth()->id(); // Current logged-in user ID
        // Students table se data retrieve karna
        $students = Studentcreate::where('program', $selectProgram)
            ->where('year', $selectYear)
            ->where('batch', $selectBatch)
            ->get();

        // Extract roll numbers from students
        $studentRollNumbers = $students->pluck('classrollno')->toArray();

        // Agar students empty hain
        if ($students->isEmpty()) {
            return response()->json([
                'message' => 'No students found for the given program, year, and batch.',
                'received_data' => [
                    'selectProgram' => $selectProgram,
                    'selectYear' => $selectYear,
                    'selectBatch' => $selectBatch,
                    'selectSubject' => $selectSubject,
                    'lectureType' => $lectureType,
                    'selectVune' => $selectVune,
                    'selectTeacher' => $selectTeacher,
                    'coTeacher' => $coTeacher,
                    'reason' => $reason,
                    'dateRangePicker' => $dateRangePicker,
                    'timePickerStart' => $timePickerStart,
                    'timePickerEnd' => $timePickerEnd,
                ],
            ]);
        }


        // Laravel Carbon ka use kar ke start aur end datetime banayein
        $startDateTime = \Carbon\Carbon::parse("$dateRangePicker $timePickerStart")->format('Y-m-d H:i:s');
        $endDateTime = \Carbon\Carbon::parse("$dateRangePicker $timePickerEnd")->format('Y-m-d H:i:s');



        // Query to fetch punch records with time range and specific terminal_sn
        $records = DB::connection('second_mysql')
            ->table('iclock_transaction')
            ->whereBetween('punch_time', [$startDateTime, $endDateTime])
            // ->where('terminal_sn', $deviceid) // Terminal serial number filter
            ->whereIn('emp_code', $studentRollNumbers)
            ->orderBy('punch_time', 'desc')
            ->get();
        // Create an empty array to store matched records
        $matchedRecords = [];

        // Track already added student roll numbers to avoid duplicates
        $addedStudents = [];

        // Track matched student roll numbers
        $matchedRollNumbers = [];

        // Loop through punch records
        foreach ($records as $record) {
            foreach ($students as $student) {
                if ($record->emp_code == $student->classrollno) {
                    // Add to matched roll numbers if not already added
                    if (!in_array($student->classrollno, $matchedRollNumbers)) {
                        $matchedRollNumbers[] = $student->classrollno;
                    }
                    // If this student's roll number is already added, skip
                    if (in_array($student->classrollno, $addedStudents)) {
                        continue;
                    }

                    // Add the matched student & punch record
                    $matchedRecords[] = [
                        'punch_record' => $record,
                        'student' => $student
                    ];

                    // Mark this student as already added
                    $addedStudents[] = $student->classrollno;

                    // Stop checking more punch records for this student
                    break;
                }
            }
        }

        $userIds = $students->pluck('userid')->unique(); // Sirf required user IDs nikal lo

        $userNames = \DB::table('users')
            ->whereIn('id', $userIds) // Sirf unhi users ka data lo jo students wale hain
            ->pluck('name', 'id');

        $finalStudents = $students->map(function ($student) use ($matchedRollNumbers, $userNames) {
            return [
                'id' => $student->id,
                'userid' => $student->userid,
                'whatsapp' => $student->whatsapp,
                'program' => $student->program,
                'session' => $student->session,
                'year' => $student->year,
                'batch' => $student->batch,
                'gender' => $student->gender,
                'classrollno' => $student->classrollno,
                'fathername' => $student->fathername,
                'fatherwhatsapp' => $student->fatherwhatsapp,
                'created_at' => $student->created_at,
                'updated_at' => $student->updated_at,
                'is_matched' => in_array($student->classrollno, $matchedRollNumbers) ? 1 : 0,
                'username' => $userNames[$student->userid] ?? 'N/A', // Agar name na mile to 'N/A'
            ];
        });

        // Response ko return karna
        return response()->json([
            'message' => 'Data received successfully',
            'received_data' => [
                'selectProgram' => $selectProgram,
                'selectYear' => $selectYear,
                'selectBatch' => $selectBatch,
                'selectSubject' => $selectSubject,
                'lectureType' => $lectureType,
                'selectVune' => $selectVune,
                'selectTeacher' => $selectTeacher,
                'coTeacher' => $coTeacher,
                'reason' => $reason,
                'dateRangePicker' => $dateRangePicker,
                'timePickerStart' => $timePickerStart,
                'timePickerEnd' => $timePickerEnd,
            ],
            'students' => $students,// Include students data in response
            'punch_records' => $records,
            'start_time' => $startDateTime,
            'end_time' => $endDateTime,
            'matched_records' => $matchedRecords,
            'finalStudents' => $finalStudents,
        ]);

    }

    public function getPunchRecords()
    {
        try {
            // Query to fetch punch records with time range and specific terminal_sn
            $records = DB::connection('second_mysql')
                ->table('iclock_transaction')
                ->whereBetween('punch_time', ['2025-01-28 21:00:00', '2025-01-28 21:55:59'])
                ->where('terminal_sn', 'CF2I192660007') // Terminal serial number filter
                ->orderBy('punch_time', 'asc')
                ->get();

            // Return JSON response
            return response()->json($records, 200, [], JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            // Return error response if something goes wrong
            return response()->json(['error' => 'Connection failed: ' . $e->getMessage()], 500);
        }
    }


    public function saveattendance(Request $request)
    {
        DB::beginTransaction(); // Transaction start

        try {
            // Step 1: Attendance Table me insert karein
            $attendance = Attendance::create([
                'programid' => $request->input('program'),
                'yearid' => $request->input('year'),
                'batchid' => $request->input('batch'),
                'subjectid' => $request->input('subject'),
                'lecturetype' => $request->input('lecturetype'),
                'venueid' => $request->input('venue'),
                'device_sn' => $request->input('device_id'),
                'assigntoteacherid' => $request->input('teacher'),
                'coteacherid' => $request->input('coteacher'),
                'reason' => $request->input('reason'),
                'date' => $request->input('start_date'),
                'starttime' => $request->input('start_time'),
                'endtime' => $request->input('end_time'),
                'createby' => $request->input('user_id'),
            ]);

            $attendanceId = $attendance->id; // Attendance insert ID

            // Step 2: Attendance Additional Info Insert
            $attendanceData = [];

            foreach ($request->all() as $key => $value) {
                if (str_starts_with($key, 'status_')) {
                    $rollNo = str_replace('status_', '', $key);
                    $studentId = $request->input("student_ids.$rollNo");

                    $attendanceData[] = [
                        'attendance_id' => $attendanceId,
                        'student_id' => $studentId,
                        'student_rollno' => $rollNo,
                        'attendance' => $value,
                    ];
                }
            }

            // Bulk Insert Attendance Additional Info
            AttendanceAdditionalinfo::insert($attendanceData);

            DB::commit(); // Transaction commit

            return response()->json(['message' => 'Attendance saved successfully!'], 200);
        } catch (\Exception $e) {
            DB::rollBack(); // Transaction rollback in case of error
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



    // public function saveattendance(Request $request)
    // {
    //     $attendanceData = [];

    //     foreach ($request->all() as $key => $value) {
    //         if (str_starts_with($key, 'status_')) {
    //             $rollNo = str_replace('status_', '', $key);
    //             $studentId = $request->input("student_ids.$rollNo");

    //             $attendanceData[] = [
    //                 'student_id' => $studentId,
    //                 'roll_no' => $rollNo,
    //                 'status' => $value
    //             ];
    //         }
    //     }
    //     dd($request->all());

    //     dd($attendanceData); // Check output
    // }






}