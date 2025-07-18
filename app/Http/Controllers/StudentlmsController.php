<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\User;
use App\Models\Assignmentcreate;
use App\Models\Assignmentswithbatches;
use App\Models\Assignmentwithstudents;
use App\Models\Assignmentsubmit;
use App\Models\Quizcreate;
use App\Models\Quizuseranswer;
use App\Models\Quizresult;
use App\Models\Quizwithbatches;
use App\Models\Quizwithstudents;
use App\Models\Userroles;
use Illuminate\Support\Facades\Hash;
use App\Models\Studentcreate;
use App\Models\Sessioncreate;
use App\Models\Subjectcreate;
use App\Models\Teacheryear;
use App\Models\Programcreate;
use App\Models\BatchAdditionalInfo;
use App\Models\Yearcreate;
use App\Models\Rolepermissions;
use App\Models\Batchcreate;
use Illuminate\Support\Facades\DB;  // Import the DB facade
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentlmsController extends Controller
{
    public function studentassignment()
    {
        $user = Auth::user(); // Get the authenticated user
        if ($user) {
            $allowedPermissions = $user->permissions()->pluck('name')->toArray();
            $userid = $user->id;
            $Userdata = Studentcreate::where('userid', $userid)->first();
            $program = $Userdata->program;
            $year = $Userdata->year;
            $batch = $Userdata->batch;
            // Use chained where conditions
            // Fetch subjects based on the program and year
            $subjectdata = Subjectcreate::where('subjectprogram', $program)
                ->where('subjectyear', $year)
                ->get();

            // Initialize an empty collection to hold all assignments
            $allAssignments = collect();
            $status = 1;
            // Loop through each subject and fetch the corresponding assignments
            foreach ($subjectdata as $subject) {
                $assignments = Assignmentcreate::where('program_id', $program)
                    ->where('year_id', $year)
                    ->where('subject_id', $subject->id)
                    ->where('status', $status)
                    ->get()
                    ->map(function (Assignmentcreate $assignment) use ($Userdata) {
                        $assignmenttype = $assignment->type;
                        $assignmentid = $assignment->id;
                        $userid1 = $Userdata->userid;
                        $existingAssignment = Assignmentsubmit::where('user_id', $userid1)
                            ->where('assignment_id', $assignmentid)
                            ->first();
                        if ($existingAssignment) {
                            $assignmentsubmitbystudnet = 1;
                            $obtainMarks = $existingAssignment->obtain_marks; // Nikal lo obtain_marks
                        } else {
                            $assignmentsubmitbystudnet = 0;
                            $obtainMarks = null; // Nikal lo obtain_marks
                        }
                        // Common fields
                        $programName = $assignment->program_id ? Programcreate::find($assignment->program_id)->name : null;
                        $yearname = $assignment->year_id ? Yearcreate::find($assignment->year_id)->name : null;
                        $subjectname = $assignment->subject_id ? Subjectcreate::find($assignment->subject_id)->name : null;
                        $username = $assignment->user_id ? User::find($assignment->user_id)->name : null;

                        if ($assignmenttype == 1) {
                            // For assignment type 1
                            return [
                                'id' => $assignment->id,
                                'start_date' => $assignment->start_date,
                                'end_date' => $assignment->end_date,
                                'totalmarks' => $assignment->totalmarks,
                                'topic' => $assignment->topic,
                                'programName' => $programName,
                                'program_id' => $assignment->program_id,
                                'yearname' => $yearname,
                                'year_id' => $assignment->year_id,
                                'subjectname' => $subjectname,
                                'subject_id' => $assignment->subject_id,
                                'username' => $username,
                                'status' => $assignment->status,
                                'assignmentsubmitbystudnet' => $assignmentsubmitbystudnet,
                                'obtainMarks' => $obtainMarks,
                            ];
                        } elseif ($assignmenttype == 2) {
                            // For assignment type 2, check against assignments_with_batches
                            $batch = $Userdata->batch;

                            $matchingAssignments = Assignmentswithbatches::where('assignment_id', $assignment->id)
                                ->where('batch_id', $batch)
                                ->get();

                            $matchingBatches = $matchingAssignments->map(function ($matchingAssignment) {
                                return [
                                    'id' => $matchingAssignment->id,
                                    'batch_id' => $matchingAssignment->batch_id,
                                ];
                            });

                            return [
                                'id' => $assignment->id,
                                'start_date' => $assignment->start_date,
                                'end_date' => $assignment->end_date,
                                'totalmarks' => $assignment->totalmarks,
                                'topic' => $assignment->topic,
                                'programName' => $programName,
                                'program_id' => $assignment->program_id,
                                'yearname' => $yearname,
                                'year_id' => $assignment->year_id,
                                'subjectname' => $subjectname,
                                'subject_id' => $assignment->subject_id,
                                'username' => $username,
                                'status' => $assignment->status,
                                'matching_batches' => $matchingBatches,
                                'assignmentsubmitbystudnet' => $assignmentsubmitbystudnet,
                                'obtainMarks' => $obtainMarks,
                            ];
                        } elseif ($assignmenttype == 3) {
                            // For assignment type 3, check against Assignmentwithstudents
                            $userid = $Userdata->userid;

                            // Fetch assignments where both assignment_id and student_id match
                            $matchingAssignments = Assignmentwithstudents::where('assignment_id', $assignment->id)
                                ->where('student_id', $userid)
                                ->get();

                            // If any matching assignments are found, return the assignment details
                            if ($matchingAssignments->isNotEmpty()) {
                                $matchingStudents = $matchingAssignments->map(function ($matchingAssignment) {
                                    return [
                                        'id' => $matchingAssignment->id,
                                        'student_id' => $matchingAssignment->student_id, // Corrected field name
                                    ];
                                });

                                return [
                                    'id' => $assignment->id,
                                    'start_date' => $assignment->start_date,
                                    'end_date' => $assignment->end_date,
                                    'totalmarks' => $assignment->totalmarks,
                                    'topic' => $assignment->topic,
                                    'programName' => $programName,
                                    'program_id' => $assignment->program_id,
                                    'yearname' => $yearname,
                                    'year_id' => $assignment->year_id,
                                    'subjectname' => $subjectname,
                                    'subject_id' => $assignment->subject_id,
                                    'username' => $username,
                                    'status' => $assignment->status,
                                    'matching_students' => $matchingStudents,
                                    'assignmentsubmitbystudnet' => $assignmentsubmitbystudnet,
                                    'obtainMarks' => $obtainMarks,
                                ];
                            }

                            // If no matching student assignments are found, return null or empty result
                            return null;
                        }
                    });

                // Filter out null results
                $assignments = $assignments->filter();

                // Merge the assignments for this subject into the overall collection
                $allAssignments = $allAssignments->merge($assignments);
            }


            // Now $allAssignments contains all the assignments for the subjects
            return view('studentlms.assignment_student', [
                'user' => $user,
                'userStatus' => $user->status, // Pass user status to the view
                'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
                'assignmentsData' => $allAssignments, // Pass allowed permissions to the view
            ]);

        } else {
            return redirect()->route('login');
        }

    }


    public function studentviewassignment($assignmentId)
    {
        $user = Auth::user(); // Get the authenticated user
        if ($user) {
            $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions

            $assignments = Assignmentcreate::where('id', $assignmentId)->get()->map(function (Assignmentcreate $assignment) {
                $programName = $assignment->program_id ? Programcreate::find($assignment->program_id)->name : null;
                $yearname = $assignment->year_id ? yearcreate::find($assignment->year_id)->name : null;
                $subjectname = $assignment->subject_id ? Subjectcreate::find($assignment->subject_id)->name : null;
                $username = $assignment->user_id ? User::find($assignment->user_id)->name : null;
                return [
                    'start_date' => $assignment->start_date,
                    'end_date' => $assignment->end_date,
                    'totalmarks' => $assignment->totalmarks,
                    'assignmentdetail' => $assignment->assignmentdetail,
                    'assignmentfile' => $assignment->assignmentfile,
                    'topic' => $assignment->topic,
                    'programName' => $programName,
                    'program_id' => $assignment->program_id,
                    'yearname' => $yearname,
                    'year_id' => $assignment->year_id,
                    'subjectname' => $subjectname,
                    'subject_id' => $assignment->subject_id,
                    'username' => $username,
                    'status' => $assignment->status,
                ];
            });

            return view('studentlms.studentviewassignment', [
                'user' => $user,
                'userStatus' => $user->status, // Pass user status to the view
                'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
                'assignmentsData' => $assignments, // Pass allowed permissions to the view
            ]);
        } else {
            return redirect()->route('login');
        }

    }

    public function studentquiz()
    {
        $user = Auth::user(); // Get the authenticated user
        if ($user) {
            $allowedPermissions = $user->permissions()->pluck('name')->toArray();
            $userid = $user->id;
            $Userdata = Studentcreate::where('userid', $userid)->first();
            $program = $Userdata->program;
            $year = $Userdata->year;
            $batch = $Userdata->batch;
            // Use chained where conditions

            // Initialize an empty collection to hold all assignments
            $allquizs = collect();
            // Loop through each subject and fetch the corresponding assignments

            $quizs = Quizcreate::where('program_id', $program)
                ->where('year_id', $year)
                ->get()
                ->map(function (Quizcreate $quiz) use ($Userdata) {
                    $quiztype = $quiz->quiz_type;
                    $quizid = $quiz->id;
                    $userid1 = $Userdata->userid;
                    $existingQuiz = Quizresult::where('user_id', $userid1)
                        ->where('quiz_id', $quizid)
                        ->first();
                    if ($existingQuiz) {
                        $quizsubmitbystudnet = $existingQuiz->status;
                        $obtain_percentage = $existingQuiz->obtain_percentage; // Nikal lo obtain_marks
                    } else {
                        $quizsubmitbystudnet = 3;
                        $obtain_percentage = null; // Nikal lo obtain_marks
                    }
                    // Common fields
                    $programName = $quiz->program_id ? Programcreate::find($quiz->program_id)->name : null;
                    $yearname = $quiz->year_id ? Yearcreate::find($quiz->year_id)->name : null;
                    $username = $quiz->user_id ? User::find($quiz->user_id)->name : null;

                    if ($quiztype == 1) {
                        // For assignment type 1
                        return [
                            'id' => $quiz->id,
                            'start_date' => $quiz->start_date,
                            'end_date' => $quiz->end_date,
                            'quiztime' => $quiz->quiztime,
                            'percentage' => $quiz->percentage,
                            'programName' => $programName,
                            'program_id' => $quiz->program_id,
                            'yearname' => $yearname,
                            'year_id' => $quiz->year_id,
                            'totalquestion_number' => $quiz->totalquestion_number,
                            'username' => $username,
                            'quizsubmitbystudnet' => $quizsubmitbystudnet,
                            'obtain_percentage' => $obtain_percentage,
                        ];
                    } elseif ($quiztype == 2) {
                        // For assignment type 2, check against assignments_with_batches
                        $batch = $Userdata->batch;

                        $matchingAssignments = Quizwithbatches::where('quiz_id', $quiz->id)
                            ->where('batch_id', $batch)
                            ->get();

                        $matchingBatches = $matchingAssignments->map(function ($matchingAssignment) {
                            return [
                                'id' => $matchingAssignment->id,
                                'batch_id' => $matchingAssignment->batch_id,
                            ];
                        });

                        return [
                            'id' => $quiz->id,
                            'start_date' => $quiz->start_date,
                            'end_date' => $quiz->end_date,
                            'quiztime' => $quiz->quiztime,
                            'percentage' => $quiz->percentage,
                            'programName' => $programName,
                            'program_id' => $quiz->program_id,
                            'yearname' => $yearname,
                            'year_id' => $quiz->year_id,
                            'totalquestion_number' => $quiz->totalquestion_number,
                            'username' => $username,
                            'quizsubmitbystudnet' => $quizsubmitbystudnet,
                            'obtain_percentage' => $obtain_percentage,
                        ];
                    } elseif ($quiztype == 3) {
                        // For assignment type 3, check against Assignmentwithstudents
                        $userid = $Userdata->userid;

                        // Fetch assignments where both assignment_id and student_id match
                        $matchingAssignments = Quizwithstudents::where('quiz_id', $quiz->id)
                            ->where('student_id', $userid)
                            ->get();

                        // If any matching assignments are found, return the assignment details
                        if ($matchingAssignments->isNotEmpty()) {
                            $matchingStudents = $matchingAssignments->map(function ($matchingAssignment) {
                                return [
                                    'id' => $matchingAssignment->id,
                                    'student_id' => $matchingAssignment->student_id, // Corrected field name
                                ];
                            });

                            return [
                                'id' => $quiz->id,
                                'start_date' => $quiz->start_date,
                                'end_date' => $quiz->end_date,
                                'quiztime' => $quiz->quiztime,
                                'percentage' => $quiz->percentage,
                                'programName' => $programName,
                                'program_id' => $quiz->program_id,
                                'yearname' => $yearname,
                                'year_id' => $quiz->year_id,
                                'totalquestion_number' => $quiz->totalquestion_number,
                                'username' => $username,
                                'quizsubmitbystudnet' => $quizsubmitbystudnet,
                                'obtain_percentage' => $obtain_percentage,
                            ];
                        }

                        // If no matching student assignments are found, return null or empty result
                        return null;
                    }
                });

            // Filter out null results
            $quizs = $quizs->filter();

            // Merge the assignments for this subject into the overall collection
            $allquizs = $allquizs->merge(items: $quizs);



            // Now $allAssignments contains all the assignments for the subjects
            return view('studentlms.quiz_student', [
                'user' => $user,
                'userStatus' => $user->status, // Pass user status to the view
                'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
                'quizsData' => $allquizs, // Pass allowed permissions to the view
            ]);

        } else {
            return redirect()->route('login');
        }

    }


    public function studentuploadassignment($assignmentId)
    {
        $user = Auth::user(); // Get the authenticated user
        if ($user) {
            // Fetch the user's permissions
            $allowedPermissions = $user->permissions()->pluck('name')->toArray();

            $userid = $user->id;
            $Userdata = Studentcreate::where('userid', $userid)->first();

            // Ensure that $Userdata exists
            if ($Userdata) {
                $program = $Userdata->program;
                $year = $Userdata->year;
                $classrollno = $Userdata->classrollno;

                // Fetch assignment data and add the classrollno from Studentcreate
                $assignments = Assignmentcreate::where('id', $assignmentId)
                    ->whereDate('end_date', '>=', date('Y-m-d')) // Check end_date
                    ->get()
                    ->map(function (Assignmentcreate $assignment) use ($classrollno) {
                        return [
                            'assignment_id' => $assignment->id,
                            'program_id' => $assignment->program_id,
                            'year_id' => $assignment->year_id,
                            'subject_id' => $assignment->subject_id,
                            'totalmarks' => $assignment->totalmarks,
                            'classrollno' => $classrollno, // Add classrollno here
                        ];
                    });
                if ($assignments->isEmpty()) {
                    return redirect()->route('studentassignment')->with('error', 'Assignment has expired.');
                }

                return view('studentlms.studentuploadassignment', [
                    'user' => $user,
                    'userStatus' => $user->status, // Pass user status to the view
                    'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
                    'assignmentsData' => $assignments, // Pass assignments to the view
                ]);
            } else {
                return redirect()->route('login')->with('error', 'Student data not found.');
            }
        } else {
            return redirect()->route('login');
        }

    }

    public function uploadassignmentbystudent(Request $request)
    {
        $request->validate([
            'userid' => 'required',
            'totalmarks' => 'required',
            'assignment_id' => 'required',
            'program_id' => 'required',
            'year_id' => 'required',
            'subject_id' => 'required',
            'studentrollno' => 'required',
        ]);

        try {
            $user_id = $request->input('userid');
            $totalmarks = $request->input('totalmarks');
            $assignment_id = $request->input('assignment_id');
            $assignmentpdf = $request->file('assignmentpdf'); // Use file()
            $program = $request->input('program_id');
            $year = $request->input('year_id');
            $subject = $request->input('subject_id');
            $studentrollno = str_replace(' ', '_', strtolower($request->input('studentrollno'))); // Convert roll number to a file-safe format
            $submit_date = date('Y-m-d');
            $yeardate = date('Y');
            $month = date('m');

            // Create the assignment folder path
            $assignmentFolder = public_path('assignment/' . $program . '/' . $year . '/' . $subject . '/' . $yeardate . '/' . $month . '/');

            // Initialize the filename
            $filename = $studentrollno . '.pdf';
            $foldername = 'assignment/' . $program . '/' . $year . '/' . $subject . '/' . $yeardate . '/' . $month . '/' . $filename;

            // Check if the folder exists, if not create it
            if (!file_exists($assignmentFolder)) {
                if (!mkdir($assignmentFolder, 0777, true) && !is_dir($assignmentFolder)) {
                    throw new \RuntimeException(sprintf('Directory "%s" was not created', $assignmentFolder));
                }
            }

            // Check if the assignment already exists
            $existingAssignment = Assignmentsubmit::where('user_id', $user_id)
                ->where('assignment_id', $assignment_id)
                ->first();

            if ($existingAssignment) {
                // If an existing assignment is found, delete the old file if it exists
                $oldFilePath = public_path($existingAssignment->assignmentfile);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath); // Delete the old file
                }
                if ($assignmentpdf) {
                    // Move the PDF to the created folder with the new name
                    $assignmentpdf->move($assignmentFolder, $filename);
                }
                // Update the existing record
                $existingAssignment->update([
                    'totalmarks' => $totalmarks,
                    'submit_date' => $submit_date,
                    'assignmentfile' => $foldername,
                ]);
            } else {
                // Handle the file upload and create a new assignment entry
                if ($assignmentpdf) {
                    // Move the PDF to the created folder with the new name
                    $assignmentpdf->move($assignmentFolder, $filename);
                }

                // Create the assignment entry in the database
                Assignmentsubmit::create([
                    'user_id' => $user_id,
                    'assignment_id' => $assignment_id,
                    'totalmarks' => $totalmarks,
                    'submit_date' => $submit_date,
                    'assignmentfile' => $foldername,
                ]);
            }

            return redirect()->route('studentassignment')->with('success', 'Assignment Successfully Uploaded');
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while uploading the assignment.');
        }
    }

}
