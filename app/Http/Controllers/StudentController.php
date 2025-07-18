<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\User;
use App\Models\Userroles;
use Illuminate\Support\Facades\Hash;
use App\Models\Studentcreate;
use App\Models\Sessioncreate;
use App\Models\Subjectcreate;
use App\Models\Teacheryear;
use App\Models\Programcreate;
use App\Models\Teachercreate;
use App\Models\BatchAdditionalInfo;
use App\Models\Yearcreate;
use App\Models\Batchcreate;
use Illuminate\Support\Facades\DB;  // Import the DB facade
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;



class StudentController extends Controller
{
    public function application()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray();
        return view('students.application', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions
        ]);
    }

    public function studentmanagement()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray();

        $usersWithStudnets = User::where('type', 2)
            ->with('student') // Eager load the teacher data
            ->get()
            ->map(function ($user) {
                $student = $user->student;
                return [
                    'name' => $user->name,
                    'email' => $user->email,
                    'whatsapp' => $student ? $student->whatsapp : null,
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
        $sessions = sessioncreate::all()->map(function ($session) {
            return [
                'id' => $session->id,
                'name' => $session->name,
                'description' => $session->description,
                'status' => $session->status,
            ];
        });
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
        $batches = Batchcreate::all()->map(function ($year) {
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
        return view('students.studentmanagement', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions,
            'rolesData' => $roles, // Pass allowed permissions to the view
            'studentData' => $usersWithStudnets, // Pass allowed permissions to the view
            'yearsData' => $years, // Pass allowed permissions to the view
            'programsData' => $programs, // Pass allowed permissions to the view
            'sessionsData' => $sessions, // Pass allowed permissions to the view
            'batchesData' => $batches // Pass allowed permissions to the view
        ]);
    }

    public function getYears($programId)
    {
        // Assume you have a way to get the current user, for example:
        $user = auth()->user(); // Get the currently authenticated user

        if ($user->type == 1) {
            // If the user type is 1, get years by program ID
            $years = Yearcreate::where('program', $programId)->get();
        } elseif ($user->type == 2) {
            // If the user type is 2, get the user's associated student data
            $student = Studentcreate::where('userid', $user->id)->first(); // Assuming you have a relationship
            if ($student) {
                // Get the year ID associated with the student
                $yearId = $student->year_id; // Adjust this to the correct column name

                // Now get years based on the year ID
                $years = Yearcreate::where('id', $yearId)->get();
            } else {
                // Handle the case where there is no associated student
                return response()->json(['message' => 'No associated student found.'], 404);
            }
        } elseif ($user->type == 4) {
            // If the user type is 4, get year IDs from the teacheryear table
            $teacherYears = Teacheryear::where('userid', $user->id)->pluck('year_id'); // Assuming teacher_id is used

            if ($teacherYears->isNotEmpty()) {
                // Get the years based on the retrieved year IDs
                $years = Yearcreate::whereIn('id', $teacherYears)->get();
            } else {
                // Handle the case where there are no associated year IDs
                return response()->json(['message' => 'No associated years found for this teacher.'], 404);
            }
        } else {
            // If the user type is neither 1, 2, nor 4, you can handle this case as needed
            return response()->json(['message' => 'Invalid user type.'], 400);
        }

        // Return the years as a JSON response
        return response()->json(['years' => $years]);
    }


    public function getassignedYears($teacherId)
    {
        // Ensure that teacherId is being treated as a single value
        $yearassignedid = Teacheryear::where('userid', $teacherId) // Assuming 'userid' is the foreign key
            ->pluck('year_id') // Get the year_id(s) associated with this teacher
            ->toArray();

        return response()->json(['yearassignedid' => $yearassignedid]);
    }

    public function getBatch($yearId)
    {
        $user = Auth::user(); // Get the authenticated user

        if ($user->user_type == 4) { // Check if user type is 4 (teacher)
            // Get all year IDs associated with the teacher from the teacheryear table
            $yearIds = Teacheryear::where('user_id', $user->id)->pluck('year_id');

            // If yearIds is empty, return an empty response
            if ($yearIds->isEmpty()) {
                return response()->json(['batches' => []]);
            }

            // Get batch IDs from BatchAdditionalInfo based on the year IDs
            $batchesId = BatchAdditionalInfo::whereIn('year_id', $yearIds)->pluck('batch_id');

            // Use those IDs to get the corresponding records from Batchcreate
            $batches = Batchcreate::whereIn('id', $batchesId)->get();

            // Return the result as a JSON response
            return response()->json(['batches' => $batches]);
        } else {
            // Get batch IDs from BatchAdditionalInfo based on year_id
            $batchesId = BatchAdditionalInfo::where('year_id', $yearId)->pluck('batch_id'); // Assuming 'batch_id' is the column name

            // Use those IDs to get the corresponding records from Batchcreate
            $batches = Batchcreate::whereIn('id', $batchesId)->get();

            // Return the result as a JSON response
            return response()->json(['batches' => $batches]);
        }
    }

    public function getTeacher($programId)
    {
        // Ensure $programId is an array
        $programId = is_array($programId) ? $programId : [$programId];

        // Fetch teacher IDs based on the program ID(s)
        $teacherIds = Teachercreate::whereIn('program', $programId)->pluck('userid'); // Extract only the user IDs

        // If no teacher IDs are found, return an empty response
        if ($teacherIds->isEmpty()) {
            return response()->json(['teachers' => []]);
        }

        // Fetch user data for the retrieved teacher IDs
        $teachers = User::whereIn('id', $teacherIds)->get();

        // Return the result as a JSON response
        return response()->json(['teachers' => $teachers]);
    }

    public function getsubject($yearId)
    {
        // Use those IDs to get the corresponding records from Batchcreate
        $subjects = Subjectcreate::where('subjectyear', $yearId)->get();

        // Return the result as a JSON response
        return response()->json(['subjects' => $subjects]);
    }
    
    public function getdevice($venueId)
    {
        // Step 1: `devices_additional_info` table me `$venueId` match karna aur `device_id` lena
        $deviceInfo = DB::table('devices_additional_info')
            ->where('venue_id', $venueId) // venue_id se match karna
            ->select('device_id')
            ->first();

        // Agar koi device_id nahi mila to response bhejna
        if (!$deviceInfo) {
            return response()->json(['error' => 'No device found for this venue ID'], 404);
        }

        // Step 2: `devices` table me `device_id` match karna aur `ipaddress` lena
        $device = DB::table('devices')
            ->where('id', $deviceInfo->device_id)
            ->select('ipaddress')
            ->first();

        // Agar device nahi mila to response bhejna
        if (!$device) {
            return response()->json(['error' => 'Device ID found but no matching device in devices table'], 404);
        }

        // Step 3: IP address response me bhejna
        return response()->json([
            'device_id' => $deviceInfo->device_id,
            'ipaddress' => $device->ipaddress
        ]);
    }

    public function getstudent($yearId, $selectedProgramValue)
    {
        // Use those IDs to get the corresponding records from Studentcreate
        $students = Studentcreate::where('program', $selectedProgramValue)
            ->where('year', $yearId)
            ->get();

        // Pluck all user IDs from the students collection
        $userIds = $students->pluck('userid');

        // Use the User model to get all users with the matching IDs
        $users = User::whereIn('id', $userIds)->get();

        // Return the result as a JSON response
        return response()->json(['students' => $users]);
    }


    public function createstudent(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'whatsapp' => 'required',
            'rolename' => 'required',
        ]);
        $type = 2;
        // $password = Str::upper(Str::random(2)) . Str::lower(Str::random(4)) . Str::random(2);
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'type' => $type,
        ]);
        $insertedId = $user->id;
        $studentcreate = studentcreate::create([
            'userid' => $insertedId,
            'whatsapp' => $request->input('whatsapp'),
            'program' => $request->input('program'),
            'session' => $request->input('session'),
            'year' => $request->input('year'),
            'batch' => $request->input('batch'),
            'gender' => $request->input('gender'),
            'classrollno' => $request->input('classrollno'),
            'studnetcnic' => $request->input('studnetcnic'),
            'studnetdob' => $request->input('studnetdob'),
            'datetojoin' => $request->input('datetojoin'),
            'domicile' => $request->input('domicile'),
            'migrationcollege' => $request->input('migrationcollege'),
            'studentaddress' => $request->input('studentaddress'),
            'fathername' => $request->input('fathername'),
            'fathercnic' => $request->input('fathercnic'),
            'fatherwhatsapp' => $request->input('fatherwhatsapp'),
            'ssctitle' => $request->input('ssctitle'),
            'matricrollno' => $request->input('matricrollno'),
            'matricyear' => $request->input('matricyear'),
            'matricregisno' => $request->input('matricregisno'),
            'matrictotalmarks' => $request->input('matrictotalmarks'),
            'matricobtainmarks' => $request->input('matricobtainmarks'),
            'matricboard' => $request->input('matricboard'),
            'hssctitle' => $request->input('hssctitle'),
            'interrollno' => $request->input('interrollno'),
            'interyear' => $request->input('interyear'),
            'interregisno' => $request->input('interregisno'),
            'intertotalmarks' => $request->input('intertotalmarks'),
            'interobtainmarks' => $request->input('interobtainmarks'),
            'interboard' => $request->input('interboard'),
            'entrytestobtmarks' => $request->input('entrytestobtmarks'),
            'entrytesttype' => $request->input('entrytesttype'),
            'entrytestpassyear' => $request->input('entrytestpassyear'),
            'testbody' => $request->input('testbody'),
        ]);
        $userroles = Userroles::create([
            'user_id' => $insertedId,
            'role_id' => $request->input('rolename'),
        ]);


        return redirect()->route('studentmanagement')->with('success', 'Student Succesfully Create');
    }

    public function accountbook()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray();
        return view('students.accountbook', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions
        ]);
    }

    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $emailExists = User::where('email', $request->email)->exists();

        if ($emailExists) {
            return response()->json([
                'success' => false,
                'message' => 'This email is already registered. Please use a different email.',
            ]);
        }

        return response()->json([
            'success' => true,
        ]);
    }

    public function submitapplication(Request $request)
    {

        // Get the data sent from the form
        $allFormData = $request->all(); // This will retrieve all the form data

        // Store each form data in separate variables
        $firstFormData = $allFormData[0];  // First form (email, password)
        $secondFormData = $allFormData[1]; // Second form (selected program)
        $thirdFormData = $allFormData[2];  // Third form (selected type)
        $fourthFormData = $allFormData[3]; // Fourth form (name, phone, etc.)
        $fifthFormData = $allFormData[4];  // Fifth form (fathername, fatherphone, etc.)
        $sixthFormData = $allFormData[5];  // Sixth form (totalmarks, obtainmarks, etc.)
        $seventhFormData = $allFormData[6]; // Seventh form (fsctotalmarks, fscobtainmarks, etc.)
        $eigthFormData = $allFormData[7]; // Seventh form (fsctotalmarks, fscobtainmarks, etc.)

        // Example: Access specific values
        $email = $firstFormData['email'];
        $password = $firstFormData['password'];
        $sessionid = $firstFormData['sessionid'];

        $selectedProgram = $secondFormData['selected_program'];

        $selectedType = $thirdFormData['selected_type'];

        $name = $fourthFormData['name'];
        $phone = $fourthFormData['phone'];
        $cnic = $fourthFormData['cnic'];
        $city = $fourthFormData['city'];
        $address = $fourthFormData['address'];


        $fatherName = $fifthFormData['fathername'];
        $fatherPhone = $fifthFormData['fatherphone'];
        $fathercnic = $fifthFormData['fathercnic'];
        $fatheremail = $fifthFormData['fatheremail'];


        $totalMarks = $sixthFormData['totalmarks'];
        $obtainMarks = $sixthFormData['obtainmarks'];
        $year = $sixthFormData['year'];
        $board = $sixthFormData['board'];


        $fscTotalMarks = $seventhFormData['fsctotalmarks'];
        $fscObtainMarks = $seventhFormData['fscobtainmarks'];
        $fscbiomarks = $seventhFormData['fscbiomarks'];
        $fscchemistrymarks = $seventhFormData['fscchemistrymarks'];
        $fscphymarks = $seventhFormData['fscphymarks'];
        $fscyear = $seventhFormData['fscyear'];
        $fscboard = $seventhFormData['fscboard'];

        $etobtainmarks = $eigthFormData['etobtainmarks'];
        $ettype = $eigthFormData['ettype'];
        $etpassingyear = $eigthFormData['etpassingyear'];
        $ettestingbody = $eigthFormData['ettestingbody'];
        //echo $name. $email.$selectedType .$selectedProgram;
        $type = 3;
        $status = 3;
        // $password = Str::upper(Str::random(2)) . Str::lower(Str::random(4)) . Str::random(2);
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'type' => $type,
            'status' => $status,
        ]);
        $insertedId = $user->id;
        $submitapplication = Admission::create([
            'userid' => $insertedId,
            'sessionid' => $sessionid,
            'selected_program' => $selectedProgram,
            'selected_type' => $selectedType,
            'phone' => $phone,
            'cnic' => $cnic,
            'city' => $city,
            'address' => $address,
            'fathername' => $fatherName,
            'fatherphone' => $fatherPhone,
            'fathercnic' => $fathercnic,
            'fatheremail' => $fatheremail,
            'totalmarks' => $totalMarks,
            'obtainmarks' => $obtainMarks,
            'year' => $year,
            'board' => $board,
            'fsctotalmarks' => $fscTotalMarks,
            'fscobtainmarks' => $fscObtainMarks,
            'fscbiomarks' => $fscbiomarks,
            'fscchemistrymarks' => $fscchemistrymarks,
            'fscphymarks' => $fscphymarks,
            'fscyear' => $fscyear,
            'fscboard' => $fscboard,
            'etobtainmarks' => $etobtainmarks,
            'ettype' => $ettype,
            'etpassingyear' => $etpassingyear,
            'ettestingbody' => $ettestingbody,
        ]);
        return response()->json($insertedId);
    }

    public function downloadstudentSampleCSV()
    {
        // Define the path to your CSV file
        $filePath = storage_path('app/public/csv/Student-Import-Sample.xlsx'); // Adjust the path if needed

        // Check if the file exists
        if (!file_exists($filePath)) {
            abort(404, 'The file does not exist.');
        }

        // Return the file as a downloadable response
        return response()->download($filePath, 'Student-Import-Sample.xlsx');
    }


    public function upload(Request $request)
    {
        // Validate the uploaded file
        $validator = Validator::make($request->all(), [
            'upload_xlsx' => 'required|mimes:xlsx|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle the uploaded file
        if ($request->hasFile('upload_xlsx')) {
            $file = $request->file('upload_xlsx');
            $session = $request->input('selectSession'); // Hash the password
            $program = $request->input('selectprogram'); // Hash the password
            $year = $request->input('selectyear'); // Hash the password
            $batch = $request->input('selectBatch'); // Hash the password
            $password = bcrypt($request->input('password')); // Hash the password

            // Use an anonymous class to read the file to an array
            $data = Excel::toArray(new class implements \Maatwebsite\Excel\Concerns\ToArray {
                public function array(array $array)
                {
                    return $array;
                }
            }, $file);

            // Assuming the data is in the first sheet
            $rows = $data[0];  // Fetch the first sheet's data

            // Skip the first row if it contains the header
            foreach ($rows as $index => $row) {
                if ($index == 0) {
                    continue; // Skip header
                }

                // Assuming columns: 'name', 'email', 'student_data1', 'student_data2'
                $name = $row[0] ?? null;
                $email = $row[1] ?? null;
                $whatsapp = $row[2] ?? null;
                $gender = $row[3] ?? null;
                $classrollno = $row[4] ?? null;
                $studnetcnic = $row[5] ?? null;
                $studnetdob = $row[6] ?? null;
                $datetojoin = $row[7] ?? null;
                $domicile = $row[8] ?? null;
                $migrationcollege = $row[9] ?? null;
                $studentaddress = $row[10] ?? null;
                $fathername = $row[11] ?? null;
                $fathercnic = $row[12] ?? null;
                $fatherwhatsapp = $row[13] ?? null;
                $ssctitle = $row[14] ?? null;
                $matricrollno = $row[15] ?? null;
                $matricyear = $row[16] ?? null;
                $matricregisno = $row[17] ?? null;
                $matrictotalmarks = $row[18] ?? null;
                $matricobtainmarks = $row[19] ?? null;
                $matricboard = $row[20] ?? null;
                $hssctitle = $row[21] ?? null;
                $interrollno = $row[22] ?? null;
                $interyear = $row[23] ?? null;
                $interregisno = $row[24] ?? null;
                $intertotalmarks = $row[25] ?? null;
                $interobtainmarks = $row[26] ?? null;
                $interboard = $row[27] ?? null;
                $entrytestobtmarks = $row[28] ?? null;
                $entrytesttype = $row[29] ?? null;
                $entrytestpassyear = $row[30] ?? null;
                $testbody = $row[31] ?? null;


                if ($name && $email) {
                    // Insert into 'users' table and get the inserted user_id
                    $user_id = DB::table('users')->insertGetId([
                        'name' => $name,
                        'email' => $email,
                        'password' => $password,
                        'type' => 2,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    // Insert into 'students' table with the corresponding user_id
                    DB::table('students')->insert([
                        'userid' => $user_id,
                        'whatsapp' => $whatsapp,
                        'program' => $program,
                        'session' => $session,
                        'year' => $year,
                        'batch' => $batch,
                        'gender' => $gender,
                        'classrollno' => $classrollno,
                        'studnetcnic' => $studnetcnic,
                        'studnetdob' => $studnetdob,
                        'datetojoin' => $datetojoin,
                        'domicile' => $domicile,
                        'migrationcollege' => $migrationcollege,
                        'studentaddress' => $studentaddress,
                        'fathername' => $fathername,
                        'fathercnic' => $fathercnic,
                        'fatherwhatsapp' => $fatherwhatsapp,
                        'ssctitle' => $ssctitle,
                        'matricrollno' => $matricrollno,
                        'matricyear' => $matricyear,
                        'matricregisno' => $matricregisno,
                        'matrictotalmarks' => $matrictotalmarks,
                        'matricobtainmarks' => $matricobtainmarks,
                        'matricboard' => $matricboard,
                        'hssctitle' => $hssctitle,
                        'interrollno' => $interrollno,
                        'interyear' => $interyear,
                        'interregisno' => $interregisno,
                        'intertotalmarks' => $intertotalmarks,
                        'interobtainmarks' => $interobtainmarks,
                        'interboard' => $interboard,
                        'entrytestobtmarks' => $entrytestobtmarks,
                        'entrytesttype' => $entrytesttype,
                        'entrytestpassyear' => $entrytestpassyear,
                        'testbody' => $testbody,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            return redirect()->back()->with('success', 'File uploaded and processed successfully.');
        }

        return redirect()->back()->with('error', 'Please upload a valid file.');
    }


}
