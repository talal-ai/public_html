<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\User;
use App\Models\Assignmentcreate;
use App\Models\Quizcreate;
use App\Models\UserQuizQuestion;
use App\Models\Quizuseranswer;
use App\Models\Quizresult;
use App\Models\Addnewquestiongroup;
use App\Models\Addnewquestion;
use App\Models\Addnewquestionoption;
use App\Models\Studentcreate;
use App\Models\Programcreate;
use App\Models\Yearcreate;
use App\Models\Teachercreate;
use App\Models\Assignmentswithbatches;
use App\Models\Assignmentwithstudents;
use App\Models\Quizwithbatches;
use App\Models\Quizwithstudents;
use App\Models\Subjectcreate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log; // Add this at the top of your file
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\DB;



class QuizController extends Controller
{

    public function addnewquestion()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        $questiongroup = Addnewquestiongroup::all()->map(function ($questiongroup) {
            return [
                'id' => $questiongroup->id,
                'name' => $questiongroup->name,
            ];
        });
        // Fetch all questions with their options
        $questions = Addnewquestion::with(['options', 'questionGroup', 'creator'])->get();


        return view('lms.addnewquestion', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
            'questiongroupData' => $questiongroup, // Pass allowed permissions to the view
            'questionsData' => $questions, // Pass allowed permissions to the view
        ]);
    }

    public function addnewquestiongroup()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
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
        return view('lms.addnewquestiongroup', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
            'questiongroupsData' => $questiongroups, // Pass allowed permissions to the view
        ]);
    }

    public function createquestiongroup(Request $request)
    {
        $request->validate([
            'questiongroupname' => 'required',
            'userid' => 'required',
        ]);
        $userid = $request->input('userid');
        $questiongroupname = $request->input('questiongroupname');

        $Addnewquestiongroup = Addnewquestiongroup::create([
            'create_by' => $userid,
            'name' => $questiongroupname,
        ]);

        return redirect()->route('addnewquestiongroup')->with('success', 'Group Succesfully Create');

    }

    public function createquestion(Request $request)
    {

        $request->validate([
            'userid' => 'required',
            'questiongroupid' => 'required',
            'questiontype' => 'required',
            'marks' => 'required',
            'questiondetail' => 'required', // Validate questiondetails as well
            'numberofoption' => 'required',
        ]);

        // Retrieve form inputs
        $userid = $request->input('userid');
        $questiongroupid = $request->input('questiongroupid');
        $questiontype = $request->input('questiontype');
        $marks = $request->input('marks');
        $questiondetails = $request->input('questiondetail');
        $numberofoption = $request->input('numberofoption');
        $shuffleanswer = $request->input('shuffleanswer') ?? 0; // Default shuffleanswer to 0 if not provided

        // Create the question entry
        $Addnewquestion = Addnewquestion::create([
            'questiongroupid' => $questiongroupid,
            'questiontype' => $questiontype,
            'shuffleanswer' => $shuffleanswer,
            'marks' => $marks,
            'questiondetail' => $questiondetails,
            'numberofoption' => $numberofoption,
            'created_by' => $userid,
        ]);

        $question_Id = $Addnewquestion->id; // Retrieve the created question ID

        // Loop through the options and save them to the database
        for ($i = 1; $i <= $numberofoption; $i++) {
            $optionText = $request->input("option_text_$i"); // Option text input field

            if ($optionText) {
                // Check if this is the correct option
                $isCorrect = $request->input("correct_option") == $i ? 1 : 0;

                // Save each option with the corresponding question_id
                Addnewquestionoption::create([
                    'question_id' => $question_Id,
                    'option_name' => $optionText,
                    'correct_value' => $isCorrect, // 1 for correct, 0 for others
                ]);
            }
        }

        // Redirect back with success message
        return redirect()->route('addnewquestion')->with('success', 'Question Successfully Created');
    }

    public function gettotalquestionofgroup($groupId)
    {
        // Assuming you have a QuizQuestion model that interacts with the quiz_question table
        $totalQuestions = Addnewquestion::where('questiongroupid', $groupId)->count();

        return response()->json([
            'totalQuestions' => $totalQuestions
        ]);
    }



    public function quizcreate(Request $request)
    {
        $request->validate([
            'program_id' => 'required',
            'year_id' => 'required',
            'quiz_type' => 'required',
            'quiztime' => 'required',
            'group_id' => 'required',
            'quiz_title' => 'required',
            'percentage' => 'required',
            'totalquestion' => 'required',
            'set_default_setting' => 'required',
            'created_by' => 'required',
        ]);

        try {

            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
            $created_by = $request->input('created_by');
            $program_id = $request->input('program_id');
            $year_id = $request->input('year_id');
            $quiz_type = $request->input('quiz_type');
            $group_id = $request->input('group_id');
            $quiz_title = $request->input('quiz_title');
            $percentage = $request->input('percentage');
            $quiztime = $request->input('quiztime');
            $totalquestion = $request->input('totalquestion');
            $totalquestion_number_input = $request->input('totalquestion_number_input');
            $totalquestion_number = $request->input('totalquestion_number');
            $set_default_setting = $request->input('set_default_setting');
            $see_ans_sheet = $request->input('see_ans_sheet');
            $show_corr_anssheet = $request->input('show_corr_anssheet');
            $show_wrong_anssheet = $request->input('show_wrong_anssheet');
            $quiz_instruction = $request->input('quiz_instruction');
            $random_question = $request->input('random_question');

            if ($totalquestion == 0) {
                $totalquestion_number_final = $totalquestion_number;
            } else {
                $totalquestion_number_final = $totalquestion_number_input;
            }

            if ($set_default_setting == 0) {
                $see_ans_sheet_final = 1;
                $show_corr_anssheet_final = 1;
                $show_wrong_anssheet_final = 1;
                $random_question_final = 1;
            } else {
                $see_ans_sheet_final = $see_ans_sheet;
                $show_corr_anssheet_final = $show_corr_anssheet;
                $show_wrong_anssheet_final = $show_wrong_anssheet;
                $random_question_final = $random_question;
            }

            if ($quiz_type == 1) {
                // Create the assignment entry with only the file name saved in the database
                $assignmentcreate = Quizcreate::create([
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'created_by' => $created_by,
                    'program_id' => $program_id,
                    'quiz_title' => $quiz_title,
                    'quiz_instruction' => $quiz_instruction,
                    'year_id' => $year_id,
                    'quiz_type' => $quiz_type,
                    'group_id' => $group_id,
                    'quiztime' => $quiztime,
                    'percentage' => $percentage,
                    'totalquestion' => $totalquestion,
                    'totalquestion_number' => $totalquestion_number_final,
                    'set_default_setting' => $set_default_setting,
                    'see_ans_sheet' => $see_ans_sheet_final,
                    'show_corr_anssheet' => $show_corr_anssheet_final,
                    'show_wrong_anssheet' => $show_wrong_anssheet_final,
                    'random_question' => $random_question_final,
                ]);
            } elseif ($quiz_type == 2) {
                $assignmentcreate = Quizcreate::create([
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'created_by' => $created_by,
                    'program_id' => $program_id,
                    'quiz_title' => $quiz_title,
                    'quiz_instruction' => $quiz_instruction,
                    'year_id' => $year_id,
                    'quiz_type' => $quiz_type,
                    'group_id' => $group_id,
                    'quiztime' => $quiztime,
                    'percentage' => $percentage,
                    'totalquestion' => $totalquestion,
                    'totalquestion_number' => $totalquestion_number_final,
                    'set_default_setting' => $set_default_setting,
                    'see_ans_sheet' => $see_ans_sheet_final,
                    'show_corr_anssheet' => $show_corr_anssheet_final,
                    'show_wrong_anssheet' => $show_wrong_anssheet_final,
                    'random_question' => $random_question_final,
                ]);

                // Get the inserted ID
                $assignmentinsertedId = $assignmentcreate->id;

                $batches = $request->input('batches');

                if ($batches) {
                    foreach ($batches as $batcheId) {

                        Quizwithbatches::create([
                            'quiz_id' => $assignmentinsertedId,
                            'batch_id' => $batcheId,
                        ]);
                    }
                }
            } elseif ($quiz_type == 3) {
                $assignmentcreate = Quizcreate::create([
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'created_by' => $created_by,
                    'program_id' => $program_id,
                    'quiz_title' => $quiz_title,
                    'quiz_instruction' => $quiz_instruction,
                    'year_id' => $year_id,
                    'quiz_type' => $quiz_type,
                    'group_id' => $group_id,
                    'quiztime' => $quiztime,
                    'percentage' => $percentage,
                    'totalquestion' => $totalquestion,
                    'totalquestion_number' => $totalquestion_number_final,
                    'set_default_setting' => $set_default_setting,
                    'see_ans_sheet' => $see_ans_sheet_final,
                    'show_corr_anssheet' => $show_corr_anssheet_final,
                    'show_wrong_anssheet' => $show_wrong_anssheet_final,
                    'random_question' => $random_question_final,
                ]);

                // Get the inserted ID
                $assignmentinsertedId = $assignmentcreate->id;

                $students = $request->input('students');

                if ($students) {
                    foreach ($students as $studentId) {

                        Quizwithstudents::create([
                            'quiz_id' => $assignmentinsertedId,
                            'student_id' => $studentId,
                        ]);
                    }
                }
            }
            return redirect()->route('quiz')->with('success', 'Quiz Successfully Uploaded');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while uploading the assignment.');
        }
    }


    public function submitQuiz(Request $request)
    {
        // Validate the request data (optional but recommended)
        $request->validate([
            'quiz_id' => 'required',
            'user_id' => 'required',
        ]);

        try {
            // Check for an existing quiz result
            $existingResult = Quizresult::where('quiz_id', $request->quiz_id)
                ->where('user_id', $request->user_id)
                ->first();
            $quizresultid = $existingResult->id;
            $existingAllowedQuestions = UserQuizQuestion::where('quiz_id', $request->quiz_id)
                ->where('user_id', $request->user_id)
                ->pluck('question_id');
            // Step 2: Calculate the total marks of all questions
            $totalMarks = Addnewquestion::whereIn('id', $existingAllowedQuestions)->sum('marks');
            // Step 3: Calculate marks for correctly answered questions
            $correctAnswerMarks = Quizuseranswer::where('quiz_result_id', $quizresultid)
                ->whereIn('question_id', $existingAllowedQuestions)
                ->whereColumn('selected_answer', 'correct_answer')  // Check if selected answer matches the correct answer
                ->sum('marks');
            // Step 4: Calculate percentage of correct answers
            $percentageCorrect = ($totalMarks > 0) ? ($correctAnswerMarks / $totalMarks) * 100 : 0;

            $updated = $existingResult->update([
                'status' => 1,
                'obtain_percentage' => $percentageCorrect
            ]);
            // If the update was successful, delete the matched entries from user_quiz_questions
            if ($updated) {
                UserQuizQuestion::where('quiz_id', $request->quiz_id)
                    ->where('user_id', $request->user_id)
                    ->delete();
            }

            // Return success response
            return response()->json(['message' => 'Quiz submitted successfully!']);
        } catch (\Exception $e) {
            // Log any exceptions that occur
            \Log::error('Error saving quiz data: ' . $e->getMessage());

            // Return an error response
            return response()->json(['message' => 'Error saving quiz data.'], 500);
        }
    }

    public function submitQuiztimeexpire(Request $request)
    {
        // Validate the request data (optional but recommended)
        $request->validate([
            'quiz_id' => 'required',
            'user_id' => 'required',
        ]);

        try {
            // Check for an existing quiz result
            $existingResult = Quizresult::where('quiz_id', $request->quiz_id)
                ->where('user_id', $request->user_id)
                ->first();
            $quizresultid = $existingResult->id;
            $existingAllowedQuestions = UserQuizQuestion::where('quiz_id', $request->quiz_id)
                ->where('user_id', $request->user_id)
                ->pluck('question_id');
            // Step 2: Calculate the total marks of all questions
            $totalMarks = Addnewquestion::whereIn('id', $existingAllowedQuestions)->sum('marks');
            // Step 3: Calculate marks for correctly answered questions
            $correctAnswerMarks = Quizuseranswer::where('quiz_result_id', $quizresultid)
                ->whereIn('question_id', $existingAllowedQuestions)
                ->whereColumn('selected_answer', 'correct_answer')  // Check if selected answer matches the correct answer
                ->sum('marks');
            // Step 4: Calculate percentage of correct answers
            $percentageCorrect = ($totalMarks > 0) ? ($correctAnswerMarks / $totalMarks) * 100 : 0;
            
            $updated = $existingResult->update([
                'status' => 0,
                'obtain_percentage' => $percentageCorrect
            ]);
            // If the update was successful, delete the matched entries from user_quiz_questions
            if ($updated) {
                UserQuizQuestion::where('quiz_id', $request->quiz_id)
                    ->where('user_id', $request->user_id)
                    ->delete();
            }
            // Return success response
            return response()->json(['message' => 'Quiz submitted successfully!']);
        } catch (\Exception $e) {
            // Log any exceptions that occur
            \Log::error('Error saving quiz data: ' . $e->getMessage());

            // Return an error response
            return response()->json(['message' => 'Error saving quiz data.'], 500);
        }
    }


    public function submitquestion(Request $request)
    {
        \Log::info('Incoming request data:', $request->all());

        $request->validate([
            'quiz_id' => 'required',
            'user_id' => 'required',
        ]);

        try {
            $existingResult = Quizresult::where('quiz_id', $request->quiz_id)
                ->where('user_id', $request->user_id)
                ->first();

            $quizResultId = $existingResult->id;
            $questionsData = $request->input('questions');
            if (is_array($questionsData)) {
                foreach ($questionsData as $index => $questionData) {
                    // Check if the required fields are set
                    if (isset($questionData['questionid'])) {
                        // Check if the question already exists in the database for this quiz result
                        $exists = Quizuseranswer::where('quiz_result_id', $quizResultId)
                            ->where('question_id', $questionData['questionid'])
                            ->exists();

                        if (!$exists) {
                            // Create a new record in the database
                            Quizuseranswer::create([
                                'quiz_result_id' => $quizResultId,
                                'question_id' => $questionData['questionid'],
                                'selected_answer' => $questionData['selectedoptionid'], // This can be null
                                'correct_answer' => $questionData['correctoptionid'],   // This can be null
                                'marks' => $questionData['questionmarks']
                            ]);

                            // Log success for each question added
                            \Log::info("Question ID {$questionData['questionid']} added successfully.");
                        } else {
                            \Log::info("Question already exists in database: Question ID {$questionData['questionid']}");
                        }
                    } else {
                        \Log::error('Invalid question data format:', ['data' => $questionData]);
                    }
                }
                return response()->json(['message' => 'Questions submitted successfully']);
            } else {
                \Log::error('Invalid questions data format:', ['data' => $questionsData]);
            }
            // return response()->json([
            //     'message' => 'Invalid question data',
            //     'questions' => $questionsData
            // ]);
        } catch (\Exception $e) {
            \Log::error('Error saving quiz data: ' . $e->getMessage());
            return response()->json(['message' => 'Error saving quiz data.'], 500);
        }
    }




}
