<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use Illuminate\Support\Carbon;
use App\Models\Quizuseranswer;
use App\Models\User;
use App\Models\Quizcreate;
use App\Models\Assignmentcreate;
use App\Models\Addnewquestion;
use App\Models\Quizresult;
use App\Models\UserQuizQuestion;
use App\Models\Addnewquestionoption;
use App\Models\Addnewquestiongroup;
use App\Models\Assignmentsubmit;
use App\Models\Studentcreate;
use App\Models\Bookcategorycreate;
use App\Models\Programcreate;
use App\Models\Teacheryear;
use App\Models\Yearcreate;
use App\Models\Videocreate;
use App\Models\Teachercreate;
use App\Models\Assignmentswithbatches;
use App\Models\Assignmentwithstudents;
use App\Models\Subjectcreate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log; // Add this at the top of your file
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\DB;



class LmsController extends Controller
{
    public function chat()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        return view('socialapps.chat', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions // Pass allowed permissions to the view
        ]);
    }

    public function videolecture()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        $programs = programcreate::all()->map(function ($program) {
            return [
                'id' => $program->id,
                'name' => $program->name,
                'description' => $program->description,
                'status' => $program->status,
            ];
        });
        // Fetch the last video (based on id)
        $lastVideo = Videocreate::orderBy('id', 'desc')->first();

        $lastVideoData = null;

        if ($lastVideo) {
            $lastVideoData = [
                'id' => $lastVideo->id,
                'name' => $lastVideo->videotitle,
                'video_id' => $lastVideo->video_id,
                'program_id' => $lastVideo->program_id,
                'year_id' => $lastVideo->year_id,
                'teacher_id' => $lastVideo->teacher_id,
                'created_by' => $lastVideo->created_by,
                'description' => $lastVideo->description,
                'status' => $lastVideo->status,
            ];
        }
        $videos = Videocreate::orderBy('id', 'desc') // Order by 'id' column in descending order
            ->get()
            ->map(function ($video): array {
                return [
                    'id' => $video->id,
                    'name' => $video->videotitle,
                    'video_id' => $video->video_id,
                    'program_id' => $video->program_id,
                    'year_id' => $video->year_id,
                    'teacher_id' => $video->teacher_id,
                    'created_by' => $video->created_by,
                    'description' => $video->description,
                    'status' => $video->status,
                ];
            });
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
        return view('lms.videolecture', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
            'userWithTeacherData' => $usersWithTeachers,
            'lastVideo' => $lastVideoData, // Pass the last video
            'programsData' => $programs, // Pass allowed permissions to the view
            'yearsData' => $years, // Pass allowed permissions to the view
            'videosData' => $videos, // Pass allowed permissions to the view
        ]);
    }
    public function viewvideo($video_id)
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        $programs = programcreate::all()->map(function ($program) {
            return [
                'id' => $program->id,
                'name' => $program->name,
                'description' => $program->description,
                'status' => $program->status,
            ];
        });
        // Fetch the specific video by video_id
        $selectedVideo = Videocreate::where('video_id', $video_id)->first();

        if (!$selectedVideo) {
            // Handle the case where the video does not exist
            abort(404, 'Video not found');
        }
        $videoData = [
            'id' => $selectedVideo->id,
            'name' => $selectedVideo->videotitle,
            'video_id' => $selectedVideo->video_id,
            'program_id' => $selectedVideo->program_id,
            'year_id' => $selectedVideo->year_id,
            'teacher_id' => $selectedVideo->teacher_id,
            'created_by' => $selectedVideo->created_by,
            'description' => $selectedVideo->description,
            'status' => $selectedVideo->status,
        ];
        $videos = Videocreate::orderBy('id', 'desc') // Order by 'id' column in descending order
            ->get()
            ->map(function ($video): array {
                return [
                    'id' => $video->id,
                    'name' => $video->videotitle,
                    'video_id' => $video->video_id,
                    'program_id' => $video->program_id,
                    'year_id' => $video->year_id,
                    'teacher_id' => $video->teacher_id,
                    'created_by' => $video->created_by,
                    'description' => $video->description,
                    'status' => $video->status,
                ];
            });

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
        return view('lms.viewvideo', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
            'userWithTeacherData' => $usersWithTeachers,
            'programsData' => $programs, // Pass allowed permissions to the view
            'yearsData' => $years, // Pass allowed permissions to the view
            'videosData' => $videos, // Pass allowed permissions to the view
            'selectedVideo' => $videoData, // Pass the selected video to the view
        ]);
    }

    public function videocreate(Request $request)
    {
        $request->validate([
            'videotitle' => 'required',
            'video_id' => 'required',
            'program_id' => 'required',
            'year_id' => 'required',
            'teacher_id' => 'required',
            'created_by' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        $Videocreate = Videocreate::create([
            'videotitle' => $request->input('videotitle'),
            'video_id' => $request->input('video_id'),
            'program_id' => $request->input('program_id'),
            'year_id' => $request->input('year_id'),
            'teacher_id' => $request->input('teacher_id'),
            'created_by' => $request->input('created_by'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);
        return redirect()->route('videolecture')->with('success', 'Video Succesfully Create');
    }


    public function quiz()
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

        if ($user->type == 1) {
            $quizs = Quizcreate::all()->map(function (Quizcreate $quiz) {
                $programName = $quiz->program_id ? Programcreate::find($quiz->program_id)->name : null;
                $yearname = $quiz->year_id ? yearcreate::find($quiz->year_id)->name : null;
                $groupname = $quiz->group_id ? Addnewquestiongroup::find($quiz->group_id)->name : null;
                $username = $quiz->created_by ? User::find($quiz->created_by)->name : null;
                return [
                    'id' => $quiz->id,
                    'start_date' => $quiz->start_date,
                    'end_date' => $quiz->end_date,
                    'quiztime' => $quiz->quiztime,
                    'programName' => $programName,
                    'yearname' => $yearname,
                    'username' => $username,
                    'groupname' => $groupname,
                ];
            });
        } elseif ($user->type == 4) {
            $quizs = Quizcreate::where('created_by', $user->id)->get()->map(function (Quizcreate $quiz) {
                $programName = $quiz->program_id ? Programcreate::find($quiz->program_id)->name : null;
                $yearname = $quiz->year_id ? yearcreate::find($quiz->year_id)->name : null;
                $groupname = $quiz->group_id ? Addnewquestiongroup::find($quiz->group_id)->name : null;
                $username = $quiz->created_by ? User::find($quiz->created_by)->name : null;
                return [
                    'id' => $quiz->id,
                    'start_date' => $quiz->start_date,
                    'end_date' => $quiz->end_date,
                    'programName' => $programName,
                    'yearname' => $yearname,
                    'username' => $username,
                    'groupname' => $groupname,
                ];
            });
        } else {
            $quizs = []; // Nullify the assignments array
        }


        $usertype = $user->type;
        $userid = $user->id; // This is the authenticated user's ID

        if ($usertype == 1) {
            $questiongroups = Addnewquestiongroup::all()->map(function ($questiongroup) {
                $userid = $questiongroup->create_by; // This is the 'create_by' user ID
                $username = User::where('id', $userid)->first()->name;
                return [
                    'id' => $questiongroup->id,
                    'name' => $questiongroup->name,
                    'create_by' => $username,
                    'created_at' => $questiongroup->created_at,
                    'updated_at' => $questiongroup->updated_at,
                ];
            });
        } else {
            // Passing $userid to the closure
            $questiongroups = Addnewquestiongroup::all()->map(function ($questiongroup) use ($userid) {
                $username = User::where('id', $userid)->first()->name; // This will now access the correct $userid
                return [
                    'id' => $questiongroup->id,
                    'name' => $questiongroup->name,
                    'create_by' => $username,
                    'created_at' => $questiongroup->created_at,
                    'updated_at' => $questiongroup->updated_at,
                ];
            });
        }
        return view('home.quiz', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
            'programsData' => $programs, // Pass allowed permissions to the view
            'yearsData' => $years, // Pass allowed permissions to the view
            'subjectsData' => $subjects, // Pass allowed permissions to the view
            'quizsData' => $quizs, // Pass allowed permissions to the view
            'questiongroupsData' => $questiongroups, // Pass allowed permissions to the view
        ]);
    }

    public function assignment()
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

        if ($user->type == 1) {
            $assignments = Assignmentcreate::all()->map(function (Assignmentcreate $assignment) {
                $programName = $assignment->program_id ? Programcreate::find($assignment->program_id)->name : null;
                $yearname = $assignment->year_id ? yearcreate::find($assignment->year_id)->name : null;
                $subjectname = $assignment->subject_id ? Subjectcreate::find($assignment->subject_id)->name : null;
                $username = $assignment->user_id ? User::find($assignment->user_id)->name : null;
                return [
                    'id' => $assignment->id,
                    'start_date' => $assignment->start_date,
                    'end_date' => $assignment->end_date,
                    'totalmarks' => $assignment->totalmarks,
                    'topic' => $assignment->topic,
                    'programName' => $programName,
                    'yearname' => $yearname,
                    'subjectname' => $subjectname,
                    'username' => $username,
                    'status' => $assignment->status,
                ];
            });
        } elseif ($user->type == 4) {
            $assignments = Assignmentcreate::where('user_id', $user->id)->get()->map(function (Assignmentcreate $assignment) {
                $programName = $assignment->program_id ? Programcreate::find($assignment->program_id)->name : null;
                $yearname = $assignment->year_id ? yearcreate::find($assignment->year_id)->name : null;
                $subjectname = $assignment->subject_id ? Subjectcreate::find($assignment->subject_id)->name : null;
                $username = $assignment->user_id ? User::find($assignment->user_id)->name : null;
                return [
                    'id' => $assignment->id,
                    'start_date' => $assignment->start_date,
                    'end_date' => $assignment->end_date,
                    'totalmarks' => $assignment->totalmarks,
                    'topic' => $assignment->topic,
                    'programName' => $programName,
                    'yearname' => $yearname,
                    'subjectname' => $subjectname,
                    'username' => $username,
                    'status' => $assignment->status,
                ];
            });
        } else {
            $assignments = []; // Nullify the assignments array
        }
        return view('home.assignment', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
            'programsData' => $programs, // Pass allowed permissions to the view
            'yearsData' => $years, // Pass allowed permissions to the view
            'subjectsData' => $subjects, // Pass allowed permissions to the view
            'assignmentsData' => $assignments, // Pass allowed permissions to the view
        ]);
    }

    public function viewassignment($assignmentId)
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions

        $assignments = Assignmentsubmit::where('assignment_id', $assignmentId)->get()->map(function (Assignmentsubmit $assignment) {
            $assignmentfile = $assignment->assignmentfile;
            $user_id = $assignment->user_id;
            $obtain_marks = $assignment->obtain_marks;
            $assignment_id = $assignment->assignment_id;
            $parts = explode('/', $assignmentfile);
            $year = $parts[4]; // Assuming year is the 4th part
            $month = $parts[5]; // Assuming month is the 5th part
            $filename = $parts[6]; // Assuming month is the 5th part
            $filename = str_replace('.pdf', '', $parts[6]);


            $Assignmentdata = Assignmentcreate::where('id', $assignment->assignment_id)->first();
            $program_id = $Assignmentdata->program_id;
            $year_id = $Assignmentdata->year_id;
            $subject_id = $Assignmentdata->subject_id;
            $programName = $assignment->program_id ? Programcreate::find($program_id)->name : null;
            $yearname = $assignment->year_id ? yearcreate::find($year_id)->name : null;
            $subjectname = $assignment->subject_id ? Subjectcreate::find($subject_id)->name : null;
            $username = $assignment->user_id ? User::find($assignment->user_id)->name : null;
            $Userdata = Studentcreate::where('userid', $assignment->user_id)->first();
            $classrollno = $Userdata->classrollno;
            return [
                'user_id' => $user_id,
                'start_date' => $assignment->start_date,
                'assignmentId' => $assignment_id,
                'assignmentfile' => $assignment->assignmentfile,
                'end_date' => $assignment->end_date,
                'totalmarks' => $assignment->totalmarks,
                'obtain_marks' => $obtain_marks,
                'topic' => $assignment->topic,
                'submit_date' => $assignment->submit_date,
                'programName' => $programName,
                'program_id' => $program_id,
                'yearname' => $yearname,
                'year_id' => $year_id,
                'year' => $year,
                'month' => $month,
                'filename' => $filename,
                'subjectname' => $subjectname,
                'subject_id' => $subject_id,
                'username' => $username,
                'status' => $assignment->status,
                'classrollno' => $classrollno,
            ];
        });

        return view('lms.viewassignment', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
            'assignmentsData' => $assignments, // Pass allowed permissions to the view
        ]);
    }

    public function viewquiz($quizId)
    {
        // Get the authenticated user
        $user = Auth::user();
        // Fetch the user's permissions
        $allowedPermissions = $user->permissions()->pluck('name')->toArray();

        // Fetch the quiz data by quiz ID
        $quiz = Quizcreate::findOrFail($quizId); // Get quiz data

        $user_id = auth()->id();
        $quiz_id = $quiz->id;
        $group_id = $quiz->group_id;
        $start_date = $quiz->start_date;
        $end_date = $quiz->end_date;
        $percentage = $quiz->percentage;
        $quiztime = $quiz->quiztime;
        $totalquestion_number = $quiz->totalquestion_number;
        $quizstartTime = Carbon::now()->format('H:i:s'); // Ensure this matches below
        $currentTime = Carbon::now()->format('H:i:s'); // Ensure this matches below
        $end_date_1 = Carbon::parse($quiz->end_date)->toDateString(); // Convert to date-only format
        $currentdate = Carbon::now()->toDateString(); // Convert to date-only format
        // echo $currentdate . $end_date_1;
        // exit();
        // Define the conditions for checking an existing quiz result
        $existingResult = Quizresult::where('quiz_id', $quiz_id)
            ->where('user_id', $user_id)
            ->first();

        if (!$existingResult && $end_date_1 >= $currentdate) {
            $quizResult = Quizresult::create([
                'quiz_id' => $quiz_id,
                'user_id' => $user_id,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'totalquestion_number' => $totalquestion_number,
                'percentage' => $percentage,
                'quiz_time' => $quiztime,
                'quizstartTime' => $quizstartTime, // Make sure to use the same variable name
                'status' => 2, // Make sure to use the same variable name
            ]);
            $quizResultId = $quizResult->id;
            // Check if questions are already stored for the user and quiz
            $savedQuestions = UserQuizQuestion::where('user_id', $user_id)
                ->where('quiz_id', $quiz_id)
                ->get();

            if ($savedQuestions->isEmpty()) {
                // Fetch a random subset of questions and save them for this user and quiz
                $questions = Addnewquestion::where('questiongroupid', $group_id)
                    ->inRandomOrder()
                    ->limit($totalquestion_number)
                    ->get();

                // Save each question to user_quiz_questions table
                foreach ($questions as $question) {
                    UserQuizQuestion::create([
                        'user_id' => $user_id,
                        'quiz_id' => $quiz_id,
                        'question_id' => $question->id,
                    ]);
                }
            } else {
                // Fetch the questions based on the stored question IDs for this user and quiz
                $questions = Addnewquestion::whereIn('id', $savedQuestions->pluck('question_id'))->get();
            }

            // Prepare quiz data to be passed to the view
            $quizData = $questions->map(function ($question) use ($quizstartTime, $quizResultId) {
                // Fetch the options for each question based on the question_id
                $options = Addnewquestionoption::where('question_id', $question->id)->get();

                // Find the correct answer from the options
                $correctAnswer = $options->firstWhere('correct_value', true);
                $correctAnswerId = $correctAnswer ? $correctAnswer->id : null; // Get the correct answer ID
                $correctAnswerName = $correctAnswer ? $correctAnswer->option_name : null; // Get the correct answer name

                // Fetch the user's selected answer for this question
                $userAnswer = Quizuseranswer::where('quiz_result_id', $quizResultId)
                    ->where('question_id', $question->id)
                    ->first();

                $selectedAnswerId = $userAnswer ? $userAnswer->selected_answer : 0; // Get the user's selected answer ID

                return [
                    'questionid' => $question->id,
                    'question' => $question->questiondetail,
                    'marks' => $question->marks,
                    'numberofoption' => $question->numberofoption,
                    'questiongroupid' => $question->questiongroupid,
                    'shuffleAnswer' => $question->shuffleanswer, // Get shuffleanswer
                    'options' => $options->map(function ($option) {
                        return [
                            'id' => $option->id, // Get the option ID
                            'name' => $option->option_name // Get the option name
                        ];
                    })->toArray(),
                    'optionsquestionid' => $options->pluck('id')->toArray(),
                    'correctAnswer' => $correctAnswerName,
                    'correctAnswerId' => $correctAnswerId,
                    'quizstartTime' => $quizstartTime, // Add quizStartTime here
                    'selectedAnswer' => $selectedAnswerId, // Include the user's selected answer
                ];
            })->toArray(); // Convert to array for easier JSON conversion later
            // Pass the data to the view
            return view('lms.viewquiz', [
                'user' => $user,
                'userStatus' => $user->status,
                'allowedPermissions' => $allowedPermissions,
                'quiz' => $quiz,
                'quizData' => $quizData, // Pass the structured quiz data
                'quizstartTime' => $quizstartTime,
                'currentTime' => $currentTime,
            ]);
        } elseif (!$existingResult && $end_date_1 <= $currentdate) {
            return view('lms.resultquiz', [
                'message' => "You quiz is expire you are not attemplt withing date.",
            ]);
        } else {
            // Existing result found, get the start time
            $quizstartTime = $existingResult->quizstartTime; // Get existing start time
            $quizResultId = $existingResult->id; // Get existing start time

            // Calculate the end time based on the quiz duration
            $endTime = Carbon::createFromFormat('H:i:s', $quizstartTime)->addMinutes($quiztime); // Create end time from start time

            // Get the current server time
            $currentServerTime = Carbon::now(); // Current server time

            // Check if the current server time is greater than the end time
            if ($existingResult && $existingResult->status !== 2) {

                if ($existingResult->status === 1) {
                    return view('lms.resultquiz', [
                        'message' => "You already Complete this quiz.",
                    ]);
                } elseif ($existingResult->status === 0) {
                    return view('lms.resultquiz', [
                        'message' => "Your Quiz is submit after time has expired.",
                    ]);
                } elseif ($currentServerTime->greaterThan($endTime)) {
                    $updated = $existingResult->update(['status' => 0]);
                    return view('lms.resultquiz', [
                        'message' => "Your Quiz is submit after time has expire.",
                    ]);
                }
            } else {
                // Check if questions are already stored for the user and quiz
                $savedQuestions = UserQuizQuestion::where('user_id', $user_id)
                    ->where('quiz_id', $quiz_id)
                    ->orderBy('id', 'asc') // Change 'id' to your desired column for ordering
                    ->get();

                if ($savedQuestions->isEmpty()) {
                    // Fetch a random subset of questions and save them for this user and quiz
                    $questions = Addnewquestion::where('questiongroupid', $group_id)
                        ->inRandomOrder()
                        ->limit($totalquestion_number)
                        ->get();

                    // Save each question to user_quiz_questions table
                    foreach ($questions as $question) {
                        UserQuizQuestion::create([
                            'user_id' => $user_id,
                            'quiz_id' => $quiz_id,
                            'question_id' => $question->id,
                        ]);
                    }
                } else {
                    // Fetch the questions based on the stored question IDs for this user and quiz
                    // $questions = Addnewquestion::whereIn('id', $savedQuestions->pluck('question_id'))->get();
                    $questionIds = $savedQuestions->pluck('question_id')->toArray();
                    $questions = Addnewquestion::whereIn('id', $questionIds)
                        ->orderByRaw('FIELD(id, ' . implode(',', $questionIds) . ')')
                        ->get();
                }

                // Prepare quiz data to be passed to the view
                $quizData = $questions->map(function ($question) use ($quizstartTime, $quizResultId) {
                    // Fetch the options for each question based on the question_id
                    $options = Addnewquestionoption::where('question_id', $question->id)->get();

                    // Find the correct answer from the options
                    $correctAnswer = $options->firstWhere('correct_value', true);
                    $correctAnswerId = $correctAnswer ? $correctAnswer->id : null; // Get the correct answer ID
                    $correctAnswerName = $correctAnswer ? $correctAnswer->option_name : null; // Get the correct answer name
                    // Fetch the user's selected answer for this question
                    $userAnswer = Quizuseranswer::where('quiz_result_id', $quizResultId)
                        ->where('question_id', $question->id)
                        ->first();

                    $selectedAnswerId = $userAnswer ? $userAnswer->selected_answer : null; // Get the user's selected answer ID

                    return [
                        'questionid' => $question->id,
                        'question' => $question->questiondetail,
                        'marks' => $question->marks,
                        'numberofoption' => $question->numberofoption,
                        'questiongroupid' => $question->questiongroupid,
                        'shuffleAnswer' => $question->shuffleanswer, // Get shuffleanswer
                        'options' => $options->map(function ($option) {
                            return [
                                'id' => $option->id, // Get the option ID
                                'name' => $option->option_name // Get the option name
                            ];
                        })->toArray(),
                        'optionsquestionid' => $options->pluck('id')->toArray(),
                        'correctAnswer' => $correctAnswerName,
                        'correctAnswerId' => $correctAnswerId,
                        'quizstartTime' => $quizstartTime, // Add quizStartTime here
                        'selectedAnswer' => $selectedAnswerId, // Include the user's selected answer
                    ];
                })->toArray(); // Convert to array for easier JSON conversion later
                // Pass the data to the view
                return view('lms.viewquiz', [
                    'user' => $user,
                    'userStatus' => $user->status,
                    'allowedPermissions' => $allowedPermissions,
                    'quiz' => $quiz,
                    'quizData' => $quizData, // Pass the structured quiz data
                    'quizstartTime' => $quizstartTime,
                    'currentTime' => $currentTime,
                ]);

            }
        }


    }


    public function downloadassignment($program, $year, $subject, $year1, $month, $filename)
    {
        // Construct the path to the file using the parameters
        $filePath = public_path("assignment/{$program}/{$year}/{$subject}/{$year1}/{$month}/{$filename}.pdf"); // Adjust to your actual file extension if different

        // Check if the file exists
        if (!file_exists($filePath)) {
            abort(404, 'The file does not exist.');
        }

        // Return the file as a downloadable response
        return response()->download($filePath, "{$filename}.pdf"); // Provide the desired download name
    }

    public function assignmentcreate(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'totalmarks' => 'required',
            'topic' => 'required',
            'assignmentpdf' => 'required|file', // Correcting to match the input
            'program' => 'required',
            'year' => 'required',
            'subject' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        try {

            $assignmenttype = $request->input('assignmenttype');
            $user_id = $request->input('user_id');
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
            $totalmarks = $request->input('totalmarks');
            $topicinput = $request->input('topic');
            $assignmentpdf = $request->file('assignmentpdf'); // Corrected to use file()
            $program = $request->input('program');
            $year = $request->input('year');
            $subject = $request->input('subject');
            $assignmentdetail = $request->input('assignmentdetail');
            $status = $request->input('status');

            // Initialize filename to null
            $filename = null;

            // Handle the file upload
            if ($request->hasFile('assignmentpdf')) {
                $topic = str_replace(' ', '_', strtolower($topicinput)); // Convert topic to a file-safe format
                $yeardate = date('Y');
                $month = date('m');
                // Create the assignment folder in public/assignment/{program}/{year}/{subject}
                $assignmentFolder = public_path('assignment/' . $program . '/' . $year . '/' . $subject . '/' . $yeardate . '/' . $month . '/');

                // Create the file name using the topic with a .pdf extension
                $filename = $topic . '.pdf';
                $foldername = 'assignment/' . $program . '/' . $year . '/' . $subject . '/' . $yeardate . '/' . $month . '/' . $filename;

                // Check if the folder exists, if not create it
                if (!file_exists($assignmentFolder)) {
                    if (!mkdir($assignmentFolder, 0777, true) && !is_dir($assignmentFolder)) {
                        throw new \RuntimeException(sprintf('Directory "%s" was not created', $assignmentFolder));
                    }
                }

                // Move the PDF to the created folder with the new name
                $assignmentpdf->move($assignmentFolder, $filename);
            }

            if ($assignmenttype == 1) {
                // Create the assignment entry with only the file name saved in the database
                $assignmentcreate = Assignmentcreate::create([
                    'user_id' => $user_id,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'totalmarks' => $totalmarks,
                    'topic' => $topic,
                    'assignmentfile' => $foldername, // Correct assignment file path
                    'program_id' => $program,
                    'year_id' => $year,
                    'subject_id' => $subject,
                    'type' => $assignmenttype,
                    'assignmentdetail' => $assignmentdetail,
                    'status' => $status,
                ]);
            } elseif ($assignmenttype == 2) {
                $assignmentcreate = Assignmentcreate::create([
                    'user_id' => $user_id,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'totalmarks' => $totalmarks,
                    'topic' => $topic,
                    'assignmentfile' => $foldername, // Correct assignment file path
                    'program_id' => $program,
                    'year_id' => $year,
                    'subject_id' => $subject,
                    'type' => $assignmenttype,
                    'assignmentdetail' => $assignmentdetail,
                    'status' => $status,
                ]);

                // Get the inserted ID
                $assignmentinsertedId = $assignmentcreate->id;

                $batches = $request->input('batches');

                if ($batches) {
                    foreach ($batches as $batcheId) {

                        Assignmentswithbatches::create([
                            'assignment_id' => $assignmentinsertedId,
                            'batch_id' => $batcheId,
                        ]);
                    }
                }
            } elseif ($assignmenttype == 3) {
                $assignmentcreate = Assignmentcreate::create([
                    'user_id' => $user_id,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'totalmarks' => $totalmarks,
                    'topic' => $topic,
                    'assignmentfile' => $foldername, // Correct assignment file path
                    'program_id' => $program,
                    'year_id' => $year,
                    'subject_id' => $subject,
                    'type' => $assignmenttype,
                    'assignmentdetail' => $assignmentdetail,
                    'status' => $status,
                ]);

                // Get the inserted ID
                $assignmentinsertedId = $assignmentcreate->id;

                $students = $request->input('students');

                if ($students) {
                    foreach ($students as $studentId) {

                        Assignmentwithstudents::create([
                            'assignment_id' => $assignmentinsertedId,
                            'student_id' => $studentId,
                        ]);
                    }
                }
            }



            return redirect()->route('assignment')->with('success', 'Assignment Successfully Uploaded');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error uploading Assignment: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while uploading the assignment.');
        }
    }

    public function updateassignmentby(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'assignmentID-edit' => 'required',
            'assignmentsubmitbyid-edit' => 'required',
            'obtainmarks-edit' => 'required',
        ]);

        // Retrieve the input data from the request
        $userid = $request->input('userid-edit');
        $assignment_id = $request->input('assignmentID-edit');
        $marks_date = $request->input('assignmentsubmitdate-edit');
        $marks_assign_user_id = $request->input('assignmentsubmitbyid-edit');
        $obtain_marks = $request->input('obtainmarks-edit');

        try {
            // Find the assignment by the assignment_id
            $assignment = Assignmentsubmit::where('assignment_id', $assignment_id)->where('user_id', $userid)->first();

            if ($assignment) {
                // Use the update method to update multiple fields at once
                $assignment->update([
                    'marks_date' => $marks_date,
                    'marks_assign_user_id' => $marks_assign_user_id, // Assuming this is the correct field
                    'obtain_marks' => $obtain_marks,
                ]);

                // Redirect back with a success message
                return redirect()->back()->with('success', 'Assignment successfully updated.');
            } else {
                // Assignment not found, return an error message
                return redirect()->back()->with('error', 'Assignment not found.');
            }
        } catch (\Exception $e) {
            // Handle any exceptions during the update process
            return redirect()->back()->with('error', 'An error occurred while updating the assignment.');
        }
    }



}
