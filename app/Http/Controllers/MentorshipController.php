<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\User;
use App\Models\Userroles;
use App\Models\MentorUserProgram;
use App\Models\Yearcreate;
use App\Models\Adminuserscreate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\MentorshipAcceptance;
use App\Models\SendRequestByTeacher;
use Illuminate\Support\Facades\DB;
use App\Models\NotificationTeacher;

class MentorshipController extends Controller
{
    public function sendrequestbyadmin()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        return view('mentorship.sendrequestbyadmin', [
            'user' => $user,
            'userStatus' => $user->status,
            'allowedPermissions' => $allowedPermissions,
        ]);
    }

    public function receivedrequestfromteacher()
    {
        $user = Auth::user();
        $allowedPermissions = $user->permissions()->pluck('name')->toArray();

        // Get all requests for the logged-in user
        $requests = SendRequestByTeacher::where('userid', $user->id)
            ->join('users', 'send_request_by_teacher.teacherid', '=', 'users.id')
            ->select('send_request_by_teacher.*', 'users.name as teacher_name', 'users.email as teacher_email')
            ->orderBy('send_request_by_teacher.created_at', 'desc')
            ->get();

        return view('mentorship.receivedrequestfromteacher', [
            'user' => $user,
            'userStatus' => $user->status,
            'allowedPermissions' => $allowedPermissions,
            'requests' => $requests
        ]);
    }

    public function sendrequestbyteacher()
    {
        $user = Auth::user();

        // Check if user is type 4
        if ($user->type !== 4) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        // Check if teacher has accepted mentorship agreement
        $hasAcceptedAgreement = \DB::table('mentorship_acceptance')
            ->where('userid', $user->id)
            ->exists();

        if (!$hasAcceptedAgreement) {
            return view('mentorship.sendrequestbyteacher', [
                'message' => 'Please accept the mentorship agreement first. See the notification for the agreement.',
                'students' => [],
                'user' => $user,
                'userStatus' => $user->status,
                'allowedPermissions' => $user->permissions()->pluck('name')->toArray()
            ]);
        }

        // Get teacher's program ID from teachers table
        $teacherProgram = \DB::table('teachers')
            ->where('userid', $user->id)
            ->value('program');

        // Get teacher's assigned years from teacheryear table
        $teacherYears = \DB::table('teacheryear')
            ->where('userid', $user->id)
            ->pluck('year_id')
            ->toArray();

        // Get currently linked students
        $linkedStudents = \DB::table('teacher_student_assignments')
            ->where('teacher_id', $user->id)
            ->where('link', 1)
            ->pluck('student_id')
            ->toArray();

        // Get students who have received requests from this teacher
        $studentsWithRequests = \DB::table('send_request_by_teacher')
            ->where('teacherid', $user->id)
            ->pluck('userid')
            ->toArray();

        // Combine both arrays to get all eligible students
        $eligibleStudentIds = array_unique(array_merge($linkedStudents, $studentsWithRequests));

        $eligibleStudents = [];

        foreach ($eligibleStudentIds as $studentId) {
            // Get user data
            $studentUser = User::find($studentId);

            if ($studentUser) {
                // Get student data from students table
                $studentData = \DB::table('students')
                    ->where('userid', $studentId)
                    ->first();

                // Check if both program and year match
                if ($studentData && 
                    $studentData->program == $teacherProgram && 
                    in_array($studentData->year, $teacherYears)) {
                    
                    // Check if student is currently linked to this teacher
                    $isLinked = \DB::table('teacher_student_assignments')
                        ->where('teacher_id', $user->id)
                        ->where('student_id', $studentId)
                        ->where('link', 1)
                        ->exists();

                    $studentUser->is_linked = $isLinked;

                    // Check request status from send_request_by_teacher table
                    $requestStatus = \DB::table('send_request_by_teacher')
                        ->where('userid', $studentId)
                        ->where('teacherid', $user->id)
                        ->orderBy('created_at', 'desc')
                        ->first();

                    // Add request status and date to student data
                    if ($requestStatus) {
                        if ($requestStatus->accepted == 1) {
                            $studentUser->request_status = 'Accepted';
                        } elseif ($requestStatus->rejected == 1) {
                            $studentUser->request_status = 'Rejected';
                        } else {
                            $studentUser->request_status = 'Pending';
                        }
                        $studentUser->request_date = $requestStatus->created_at;
                    } else {
                        $studentUser->request_status = 'Not Sent';
                        $studentUser->request_date = null;
                    }

                    $eligibleStudents[] = $studentUser;
                }
            }
        }

        $allowedPermissions = $user->permissions()->pluck('name')->toArray();
        
        return view('mentorship.sendrequestbyteacher', [
            'user' => $user,
            'userStatus' => $user->status,
            'allowedPermissions' => $allowedPermissions,
            'students' => $eligibleStudents
        ]);
    }

    public function listofacceptance()
    {
        $user = Auth::user();
        $allowedPermissions = $user->permissions()->pluck('name')->toArray();

        // First get usertype 4 records from mentorship_acceptance
        $acceptances = MentorshipAcceptance::where('usertype', 4)->get();
        
        // Get user IDs from acceptances
        $userIds = $acceptances->pluck('userid')->toArray();
        
        // Get user details for these IDs
        $usersData = User::whereIn('users.id', $userIds)
            ->select('users.*', 'mentorship_acceptance.created_at as acceptance_date')
            ->join('mentorship_acceptance', 'users.id', '=', 'mentorship_acceptance.userid')
            ->where('mentorship_acceptance.usertype', 4)
            ->get();

        return view('mentorship.listofacceptance', [
            'user' => $user,
            'userStatus' => $user->status,
            'allowedPermissions' => $allowedPermissions,
            'usersData' => $usersData
        ]);
    }

    public function listofacceptancebystudent()
    {
        $user = Auth::user();
        $allowedPermissions = $user->permissions()->pluck('name')->toArray();

        // First get usertype 4 records from mentorship_acceptance
        $acceptances = MentorshipAcceptance::where('usertype', 2)->get();
        
        // Get user IDs from acceptances
        $userIds = $acceptances->pluck('userid')->toArray();
        
        // Get user details for these IDs
        $usersData = User::whereIn('users.id', $userIds)
            ->select('users.*', 'mentorship_acceptance.created_at as acceptance_date')
            ->join('mentorship_acceptance', 'users.id', '=', 'mentorship_acceptance.userid')
            ->where('mentorship_acceptance.usertype', 2)
            ->get();

        return view('mentorship.listofacceptancebystudent', [
            'user' => $user,
            'userStatus' => $user->status,
            'allowedPermissions' => $allowedPermissions,
            'usersData' => $usersData
        ]);
    }

    public function showSendRequestForm($userId)
    {
        $user = Auth::user();
        if ($user->type !== 4) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        $student = User::find($userId);
        if (!$student) {
            return redirect()->back()->with('error', 'Student not found');
        }

        $allowedPermissions = $user->permissions()->pluck('name')->toArray();
        
        return view('mentorship.send-request-form', [
            'user' => $user,
            'userStatus' => $user->status,
            'allowedPermissions' => $allowedPermissions,
            'student' => $student
        ]);
    }

    public function storeSendRequest(Request $request)
    {
        $user = Auth::user();
        if ($user->type !== 4) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        $request->validate([
            'userid' => 'required|exists:users,id',
            'message' => 'required|string',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date'
        ]);

        SendRequestByTeacher::create([
            'userid' => $request->userid,
            'teacherid' => $user->id,
            'message' => $request->message,
            'todate' => $request->to_date,
            'fromdate' => $request->from_date,
            'accepted' => 0,
            'rejected' => 0,
        ]);

        return redirect()->route('sendrequestbyteacher')
            ->with('success', 'Request sent successfully');
    }

    public function mentorshipagreement()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        return view('mentorship.mentorshipagreement', [
            'user' => $user,
            'userStatus' => $user->status,
            'allowedPermissions' => $allowedPermissions,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $user = Auth::user();
            if (!$user) {
                return response()->json(['success' => false, 'message' => 'User not authenticated'], 401);
            }

            // Check if agreement already exists
            $existingAgreement = MentorshipAcceptance::where('userid', $user->id)->first();
            if ($existingAgreement) {
                session()->flash('error', 'Agreement already submitted!');
                return response()->json(['success' => true, 'reload' => true]);
            }

            $mentorship = new MentorshipAcceptance();
            $mentorship->userid = $user->id;
            $mentorship->usertype = $user->type;
            $mentorship->save();

            session()->flash('success', 'Agreement submitted successfully!');
            return response()->json(['success' => true, 'reload' => true]);
        } catch (\Exception $e) {
            \Log::error('Error in store method: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getprograms($userId)
    {
        // Get all program IDs associated with the given user ID
        $mentorPrograms = MentorUserProgram::where('user_id', $userId)->with('program')->get();

        // Prepare an array to hold the program data
        $programsData = [];

        foreach ($mentorPrograms as $mentorProgram) {
            $programsData[] = [
                'program_id' => $mentorProgram->program_id,
                'program_details' => $mentorProgram->program // Fetch the program details
            ];
        }

        // Return the data as a JSON response
        return response()->json(['userId' => $userId, 'programs' => $programsData]);
    }

    public function getyears($program_id)
    {

        // Query the 'Year' model to get all years that match the provided program_id
        $yearsData = Yearcreate::where('program', $program_id)->get(); // Using Eloquent to fetch data

        // Return the data as a JSON response
        return response()->json(['program_id' => $program_id, 'years' => $yearsData]);
    }

    public function viewRequest($requestId)
    {
        $user = Auth::user();
        $allowedPermissions = $user->permissions()->pluck('name')->toArray();

        // Get request details with teacher information
        $request = SendRequestByTeacher::where('send_request_by_teacher.id', $requestId)
            ->where('userid', $user->id) // Ensure the request belongs to the logged-in user
            ->join('users', 'send_request_by_teacher.teacherid', '=', 'users.id')
            ->select('send_request_by_teacher.*', 'users.name as teacher_name', 'users.email as teacher_email')
            ->firstOrFail();

        return view('mentorship.view-request', [
            'user' => $user,
            'userStatus' => $user->status,
            'allowedPermissions' => $allowedPermissions,
            'request' => $request
        ]);
    }

    public function updateRequestStatus(Request $request, $id)
    {
        $sendRequest = SendRequestByTeacher::findOrFail($id);
        
        if ($request->has('accept')) {
            $sendRequest->update([
                'accepted' => 1,
                'rejected' => 0
            ]);
            $message = 'Request accepted successfully';
        } else if ($request->has('reject')) {
            $sendRequest->update([
                'accepted' => 0,
                'rejected' => 1
            ]);
            $message = 'Request rejected successfully';
        }

        return redirect()->back()->with('success', $message);
    }

    public function showAssignableStudents($teacher_id)
    {
        $user = Auth::user();
        $allowedPermissions = $user->permissions()->pluck('name')->toArray();

        // Get teacher's program ID from teachers table
        $teacherProgram = DB::table('teachers')
            ->where('userid', $teacher_id)
            ->value('program');

        // Get teacher's assigned years from teacheryear table
        $teacherYears = DB::table('teacheryear')
            ->where('userid', $teacher_id)
            ->pluck('year_id')
            ->toArray();

        // Get user IDs from mentorship_acceptance table where usertype is 2
        $mentorshipUsers = DB::table('mentorship_acceptance')
            ->where('usertype', 2)
            ->pluck('userid')
            ->unique()
            ->toArray();

        // Get students who are linked (link = 1) to any teacher
        $linkedStudentIds = DB::table('teacher_student_assignments')
            ->where('link', 1)
            ->pluck('student_id', 'teacher_id')
            ->toArray();

        // Get already assigned students for this teacher (only those with link = 1)
        $assignedStudents = DB::table('teacher_student_assignments as tsa')
            ->join('users as u', 'tsa.student_id', '=', 'u.id')
            ->where('tsa.teacher_id', $teacher_id)
            ->where('tsa.status', 'active')
            ->where('tsa.link', 1)  // Only show students with link = 1
            ->select('u.*')
            ->get();

        // Get assigned student IDs for this teacher
        $assignedStudentIds = $assignedStudents->pluck('id')->toArray();

        // Get students who are linked to other teachers (not current teacher)
        $studentsLinkedToOthers = DB::table('teacher_student_assignments')
            ->where('link', 1)
            ->where('teacher_id', '!=', $teacher_id)
            ->pluck('student_id')
            ->toArray();

        // Get assignable students that:
        // 1. Have accepted mentorship
        // 2. Match program and year
        // 3. Are not linked to other teachers (link = 1)
        // 4. Are either:
        //    - Not assigned to any teacher
        //    - Or assigned but with link = 0
        $assignableStudents = DB::table('users as u')
            ->join('students as s', 'u.id', '=', 's.userid')
            ->leftJoin('teacher_student_assignments as tsa', function($join) {
                $join->on('u.id', '=', 'tsa.student_id')
                    ->where('tsa.link', 1);
            })
            ->whereIn('u.id', $mentorshipUsers)
            ->whereNotIn('u.id', $studentsLinkedToOthers)
            ->where('s.program', $teacherProgram)
            ->whereIn('s.year', $teacherYears)
            ->whereNull('tsa.id')  // Ensures student is not linked to any teacher
            ->select('u.*')
            ->distinct()
            ->get();

        // Get teacher details
        $teacher = DB::table('users')->find($teacher_id);

        return view('mentorship.assignable-students', [
            'user' => $user,
            'userStatus' => $user->status,
            'allowedPermissions' => $allowedPermissions,
            'assignableStudents' => $assignableStudents,
            'assignedStudents' => $assignedStudents,
            'teacher' => $teacher
        ]);
    }

    public function saveAssignments(Request $request, $teacher_id)
    {
        try {
            // Validate request
            $request->validate([
                'assignments' => 'required|array|min:1',
                'assignments.*.student_id' => 'required|exists:users,id'
            ]);

            DB::beginTransaction();

            // Get new student IDs from the request
            $newStudentIds = collect($request->assignments)->pluck('student_id')->toArray();

            // Get students that would be unlinked (not in new assignments)
            $studentsToUnlink = DB::table('teacher_student_assignments')
                ->where('teacher_id', $teacher_id)
                ->whereNotIn('student_id', $newStudentIds)
                ->pluck('student_id')
                ->toArray();

            // Check request status for students to be unlinked
            $unableToUnlink = [];
            foreach ($studentsToUnlink as $studentId) {
                $requestStatus = DB::table('send_request_by_teacher')
                    ->where('teacherid', $teacher_id)
                    ->where('userid', $studentId)
                    ->orderBy('created_at', 'desc')
                    ->first();

                // If request exists and is either pending or accepted, can't unlink
                if ($requestStatus && 
                    ($requestStatus->accepted == 1 || 
                    ($requestStatus->accepted == 0 && $requestStatus->rejected == 0))) {
                    
                    // Get student name for the message
                    $studentName = DB::table('users')
                        ->where('id', $studentId)
                        ->value('name');

                    $status = $requestStatus->accepted == 1 ? 'accepted' : 'pending';
                    $unableToUnlink[] = "Cannot unlink student '$studentName' because request is $status";
                    
                    // Add this student ID back to newStudentIds to keep them linked
                    $newStudentIds[] = $studentId;
                }
            }

            // Update existing assignments not in new data to link = 0
            // (only for those that can be unlinked)
            DB::table('teacher_student_assignments')
                ->where('teacher_id', $teacher_id)
                ->whereNotIn('student_id', $newStudentIds)
                ->update(['link' => 0]);

            // Process each new assignment
            foreach ($request->assignments as $assignment) {
                $studentId = $assignment['student_id'];

                // Check if assignment already exists
                $existingAssignment = DB::table('teacher_student_assignments')
                    ->where('teacher_id', $teacher_id)
                    ->where('student_id', $studentId)
                    ->first();

                if ($existingAssignment) {
                    // Update existing assignment to link = 1
                    DB::table('teacher_student_assignments')
                        ->where('teacher_id', $teacher_id)
                        ->where('student_id', $studentId)
                        ->update([
                            'link' => 1,
                            'status' => 'active',
                            'updated_at' => now()
                        ]);
                } else {
                    // Insert new assignment with link = 1
                    DB::table('teacher_student_assignments')->insert([
                        'teacher_id' => $teacher_id,
                        'student_id' => $studentId,
                        'status' => 'active',
                        'link' => 1,
                        'assigned_at' => now(),
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }

            DB::commit();

            // Return success with any unable to unlink messages
            return response()->json([
                'success' => true,
                'unableToUnlink' => $unableToUnlink
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    
    
     public function createteacherlist()
    {
        $user = Auth::user();
        $allowedPermissions = $user->permissions()->pluck('name')->toArray();

        // Get type 4 users (teachers)
        $nonMentorshipTeachers = User::where('type', 4)
            ->whereNotIn('id', function($query) {
                $query->select('teacher_id')
                    ->from('mentorship_teachers_list');
            })
            ->get();

        $mentorshipTeachers = User::where('type', 4)
            ->whereIn('id', function($query) {
                $query->select('teacher_id')
                    ->from('mentorship_teachers_list');
            })
            ->get();

        return view('mentorship.createteacherlist', [
            'user' => $user,
            'userStatus' => $user->status,
            'allowedPermissions' => $allowedPermissions,
            'nonMentorshipTeachers' => $nonMentorshipTeachers,
            'mentorshipTeachers' => $mentorshipTeachers
        ]);
    }

    public function saveTeacherList(Request $request)
    {
        DB::beginTransaction();
        
        try {
            $teacherIds = $request->input('teachers', []);
            
            // Clear existing records
            DB::table('mentorship_teachers_list')->delete();
            
            // Insert new records
            foreach ($teacherIds as $teacherId) {
                DB::table('mentorship_teachers_list')->insert([
                    'teacher_id' => $teacherId,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
            
            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
    
    public function getTeachersList()
    {
        $teachers = DB::table('mentorship_teachers_list')
            ->join('users', 'mentorship_teachers_list.teacher_id', '=', 'users.id')
            ->select('users.id', 'users.name', 'users.email')
            ->get();
        
        return response()->json($teachers);
    }

    public function sendTeacherRequest(Request $request)
    {
        try {
            $notification = new NotificationTeacher();
            $notification->user_id = $request->user_id;
            $notification->teacher_id = $request->teacher_id;
            $notification->title = "New Request";
            $notification->message = "You have received a new mentorship request";
            $notification->status = 0;
            $notification->save();

            return response()->json(['success' => true, 'message' => 'Notification sent successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to send notification', 'error' => $e->getMessage()]);
        }
    }
}
