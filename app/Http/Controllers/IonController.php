<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Teacherdesination;
use App\Models\Programcreate;
use App\Models\Yearcreate;
use App\Models\Noticboard;
use App\Models\Noticboardyear;
use App\Models\Noticboarduser;
use App\Models\Noticboardprogram;
use App\Models\Noticboardbatch;
use App\Models\Noticboardattachment;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class IonController extends Controller
{
    public function ion()
    {
        $user = Auth::user();
        $usertype = $user->type;
        $notices = collect();

        if ($user->type === 2) {
            // Fetch student details
            $student = DB::table('students')
                ->where('userid', $user->id)
                ->first();

            if ($student) {
                // Fetch notice IDs from each related table
                $programNotices = DB::table('noticboard_program')
                    ->where('program_id', $student->program)
                    ->pluck('noticboardid');

                $yearNotices = DB::table('noticboard_year')
                    ->where('year_id', $student->year)
                    ->pluck('noticboardid');

                $batchNotices = DB::table('noticboard_batch')
                    ->where('batch_id', $student->batch)
                    ->pluck('noticboardid');

                $userNotices = DB::table('noticboard_user')
                    ->where('userid', $user->id)
                    ->pluck('noticboardid');

                // Combine all notice IDs
                $allNoticeIds = $programNotices
                    ->merge($yearNotices)
                    ->merge($batchNotices)
                    ->merge($userNotices)
                    ->unique();

                // Fetch notices matching these IDs only
                $notices = DB::table('noticboard')
                    ->leftJoin('users', 'noticboard.created_by', '=', 'users.id')
                    ->whereIn('noticboard.id', $allNoticeIds)
                    ->select('noticboard.*', 'users.name as created_by_name')
                    ->orderBy('noticboard.id', 'desc')
                    ->get();
            } else {
                // If no student record is found, fall back to all notices
                $notices = DB::table('noticboard')
                    ->leftJoin('users', 'noticboard.created_by', '=', 'users.id')
                    ->select('noticboard.*', 'users.name as created_by_name')
                    ->orderBy('noticboard.id', 'desc')
                    ->get();
            }
        } elseif ($user->type === 4) {
            // Fetch student details
            $student = DB::table('students')
                ->where('userid', $user->id)
                ->first();

            if ($student) {
                $userNotices = DB::table('noticboard_user')
                    ->where('userid', $user->id)
                    ->pluck('noticboardid');

                // Combine all notice IDs
                $allNoticeIds = $userNotices->unique();

                // Fetch notices matching these IDs only
                $notices = DB::table('noticboard')
                    ->leftJoin('users', 'noticboard.created_by', '=', 'users.id')
                    ->whereIn('noticboard.id', $allNoticeIds)
                    ->select('noticboard.*', 'users.name as created_by_name')
                    ->orderBy('noticboard.id', 'desc')
                    ->get();
            } else {
                $userNotices = DB::table('noticboard_user')
                ->where('userid', $user->id)
                ->pluck('noticboardid');

                 // Combine all notice IDs
                 $allNoticeIds = $userNotices->unique();
                // If no student record is found, fall back to all notices
                $notices = DB::table('noticboard')
                    ->leftJoin('users', 'noticboard.created_by', '=', 'users.id')
                    ->whereIn('noticboard.id', $allNoticeIds)
                    ->select('noticboard.*', 'users.name as created_by_name')
                    ->orderBy('noticboard.id', 'desc')
                    ->get();
            }
        } else {
            // Fetch all notices for non-student users
            $notices = DB::table('noticboard')
                ->leftJoin('users', 'noticboard.created_by', '=', 'users.id')
                ->select('noticboard.*', 'users.name as created_by_name')
                ->orderBy('noticboard.id', 'desc')
                ->get();
        }


        //dd($notices);



        $totalNotifications = $notices->count();
        $userdesignations = [];
        if ($usertype == 4) {
            $userdesignations = Teacherdesination::where('teacherid', auth()->id()) // Adjust 'teacerid' as needed
                ->get()
                ->map(function ($designation) {
                    return [
                        'id' => $designation->id,
                        'teacher_id' => $designation->teacherid, // Ensure this matches your column name
                        'designation_id' => $designation->designationid, // Ensure this matches your column name
                    ];
                });
        }
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        // Prepare programs data
        $programs = Programcreate::all()->map(function ($program) {
            return [
                'id' => $program->id,
                'name' => $program->name,
                'description' => $program->description,
                'status' => $program->status,
            ];
        });
        $Users = User::all()->map(function ($User) {
            return [
                'id' => $User->id,
                'name' => $User->name,
                'email' => $User->email,
            ];
        });
        $Years = Yearcreate::all()->map(function ($Year) {
            return [
                'id' => $Year->id,
                'name' => $Year->name,
            ];
        });

        return view('home.ion', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
            'userdesignations' => $userdesignations,
            'programsData' => $programs, // Pass allowed permissions to the view
            'UsersData' => $Users, // Pass allowed permissions to the view
            'YearsData' => $Years, // Pass allowed permissions to the view
            'noticesData' => $notices, // Pass allowed permissions to the view
            'totalNotifications' => $totalNotifications,
        ]);
    }

    public function submitnotification(Request $request)
    {
        $emails = $request->input('emails', []);
        $years = $request->input('years', []);
        $programs = $request->input('programs', []);
        $batches = $request->input('batches', []);
        $inputSubject = $request->input('inputSubject');
        $textareaMessage = $request->input('textareaMessage');
        $userid = $request->input('userid');
        $attachments = $request->file('attachments');
        $Noticboard = Noticboard::create([
            'subject_title' => $inputSubject,
            'message' => $textareaMessage,
            'created_by' => $userid,
        ]);
        $NoticboardId = $Noticboard->id;

        if (!empty($years)) {
            foreach ($years as $yearId) {
                Noticboardyear::create([
                    'noticboardid' => $NoticboardId,
                    'year_id' => $yearId,
                ]);
            }
        }

        if (!empty($emails)) {
            foreach ($emails as $emailId) {
                Noticboarduser::create([
                    'noticboardid' => $NoticboardId,
                    'userid' => $emailId,
                ]);
            }
        }

        if (!empty($programs)) {
            foreach ($programs as $programId) {
                Noticboardprogram::create([
                    'noticboardid' => $NoticboardId,
                    'program_id' => $programId,
                ]);
            }
        }

        if (!empty($batches)) {
            foreach ($batches as $batcheId) {
                Noticboardbatch::create([
                    'noticboardid' => $NoticboardId,
                    'batch_id' => $batcheId,
                ]);
            }
        }

        if ($attachments) {
            foreach ($attachments as $fileName) {
                $extension = $fileName->getClientOriginalExtension();
                // Generate a new file name based on the NoticboardId
                $newFileName = "notification{$NoticboardId}.{$extension}";

                // Get current year and month for directory structure
                $currentYear = Carbon::now()->year;
                $currentMonth = Carbon::now()->month;

                // Define the path to store the file
                $directoryPath = public_path("uploads/notifications/{$currentYear}/{$currentMonth}");

                // Ensure the directory exists
                if (!is_dir($directoryPath)) {
                    mkdir($directoryPath, 0777, true);
                }

                // Move the file to the directory
                $fileName->move($directoryPath, $newFileName);

                // Save the file information in the database
                Noticboardattachment::create([
                    'noticboard_id' => $NoticboardId,
                    'file_name' => $newFileName,
                ]);
            }
        }

        return redirect()->route('ion')->with('success', 'Notification Succesfully Create');
    }

    public function getnoticfication($noticeId)
    {
        // Fetch the notice along with the creator and attachments
        $notice = Noticboard::with(['createdBy', 'attachments']) // Eager load relationships
            ->where('id', $noticeId)
            ->first();

        if (!$notice) {
            return response()->json(['error' => 'Notice not found'], 404);
        }

        return response()->json(['notice' => $notice]);

    }
}
