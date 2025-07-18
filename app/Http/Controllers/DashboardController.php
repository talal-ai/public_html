<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\FeedbackResponse;
use App\Models\FeedbackQuestion;
use App\Models\FeedbackOption;
use App\Models\Role;
use App\Models\Rolepermissions;
use App\Models\Studentcreate;
use App\Models\Teachercreate;
use Illuminate\Support\Facades\DB;  // Import the DB facade
use App\Exports\SurveyStatsExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;




class DashboardController extends Controller
{

    public function welcomeadmin()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        // Fetch all questions along with their associated category and survey type
        $questions = FeedbackQuestion::with('category')->get();

        // Map through each question to extract necessary details
        $questionsWithSurveyType = $questions->map(function ($question) {
            return [
                'id' => $question->id,
                'question_text' => $question->question_text,
                'category_id' => $question->category_id,
                'survey_type' => $question->category->survey_type, // Accessing survey_type from category
            ];
        });
        $feedbackResponse = new FeedbackResponse();
        $faultysurveyStats = $feedbackResponse->calculateSurveyTypeStats('faultysurvey');
        $coursesurveyStats = $feedbackResponse->calculateSurveyTypeStats('coursesurvey');
        // Get the count of users with usertype 4
        $usertype2Count = User::where('type', 2)->count();
        $usertype4Count = User::where('type', 4)->count();
        $usertype5Count = User::where('type', 5)->count();
        $usertype6Count = User::where('type', 6)->count();
        return view('home.welcomeadmin', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
            'questionsWithSurveyType' => $questionsWithSurveyType, // Pass allowed permissions to the view
            'faultysurveyStats' => $faultysurveyStats, // Pass allowed permissions to the view
            'coursesurveyStats' => $coursesurveyStats, // Pass allowed permissions to the view
            'usertype4Count' => $usertype4Count, // Pass the count of usertype 4 to the view
            'usertype2Count' => $usertype2Count, // Pass the count of usertype 4 to the view
            'usertype5Count' => $usertype5Count, // Pass the count of usertype 4 to the view
            'usertype6Count' => $usertype6Count, // Pass the count of usertype 4 to the view
        ]);
    }

    public function getQuestionStats($id, $surveyName)
    {
        // Fetch the stats for the given question ID
        $questionStats = $this->fetchQuestionStats($id, $surveyName); // Define this method to get the stats

        // Return data as JSON
        return response()->json($questionStats);
    }
    // protected function fetchQuestionStats($questionId,$surveyName)
    // {
    //     // Fetch the feedback responses for the given question ID and survey type
    //     $feedbackResponses = FeedbackResponse::where('question_id', $questionId)
    //         ->where('survey_type', $surveyName)
    //         ->get();

    //     // Initialize the stats array
    //     $stats = [
    //         'Very Dissatisfied' => 0,
    //         'Dissatisfied' => 0,
    //         'Neutral' => 0,
    //         'Satisfied' => 0,
    //         'Very Satisfied' => 0
    //     ];

    //     // Initialize a variable to store unique user IDs
    //     $uniqueUsers = [];

    //     // Loop through each feedback response and update the stats
    //     foreach ($feedbackResponses as $response) {
    //         // Fetch the value from feedback_option based on the option_id
    //         $option = FeedbackOption::find($response->option_id);

    //         if ($option) {
    //             $value = $option->value; // Assume `value` is a column in feedback_option that contains the response label
    //             // Map the option value to the corresponding stat category
    //             switch ($value) {
    //                 case 1:
    //                     $stats['Very Dissatisfied']++;
    //                     break;
    //                 case 2:
    //                     $stats['Dissatisfied']++;
    //                     break;
    //                 case 3:
    //                     $stats['Neutral']++;
    //                     break;
    //                 case 4:
    //                     $stats['Satisfied']++;
    //                     break;
    //                 case 5:
    //                     $stats['Very Satisfied']++;
    //                     break;
    //             }
    //         }

    //         // Track unique users
    //         $uniqueUsers[$response->user_id] = true;
    //     }

    //     return [
    //         'stats' => $stats,
    //         'totalUniqueUsers' => count($uniqueUsers),
    //     ];
    // }


    protected function fetchQuestionStats($questionId, $surveyName)
    {
        // Define an array to map survey names to their corresponding stats and switch cases
        $surveyConfig = [
            'faultysurvey' => [
                'stats' => [
                    'Very Dissatisfied' => 0,
                    'Dissatisfied' => 0,
                    'Neutral' => 0,
                    'Satisfied' => 0,
                    'Very Satisfied' => 0
                ],
                'switchCase' => [
                    1 => 'Very Dissatisfied',
                    2 => 'Dissatisfied',
                    3 => 'Neutral',
                    4 => 'Satisfied',
                    5 => 'Very Satisfied'
                ]
            ],
            'coursesurvey' => [
                'stats' => [
                    'Strongly Disagree' => 0,
                    'Disagree' => 0,
                    'Uncertain' => 0,
                    'Agree' => 0,
                    'Strongly Agree' => 0
                ],
                'switchCase' => [
                    1 => 'Strongly Disagree',
                    2 => 'Disagree',
                    3 => 'Uncertain',
                    4 => 'Agree',
                    5 => 'Strongly Agree'
                ]
            ]
        ];

        // Fetch the feedback responses for the given question ID and survey type
        $feedbackResponses = FeedbackResponse::where('question_id', $questionId)
            ->where('survey_type', $surveyName)
            ->get();

        // Initialize the stats array based on the survey name
        $stats = $surveyConfig[$surveyName]['stats'];

        // Initialize a variable to store unique user IDs
        $uniqueUsers = [];

        // Loop through each feedback response and update the stats
        foreach ($feedbackResponses as $response) {
            // Fetch the value from feedback_option based on the option_id
            $option = FeedbackOption::find($response->option_id);

            if ($option) {
                $value = $option->value; // Assume `value` is a column in feedback_option that contains the response label
                // Map the option value to the corresponding stat category based on the survey name
                $stats[$surveyConfig[$surveyName]['switchCase'][$value]]++;
            }

            // Track unique users
            $uniqueUsers[$response->user_id] = true;
        }

        return [
            'stats' => $stats,
            'totalUniqueUsers' => count($uniqueUsers),
        ];
    }


    //     public function exportSurveyStats()
// {
//     // Fetch survey stats
//     $feedbackResponse = new FeedbackResponse();
//     $faultysurveyStats = $feedbackResponse->calculateSurveyTypeStats('faultysurvey');
//     $coursesurveyStats = $feedbackResponse->calculateSurveyTypeStats('coursesurvey');

    //     // Fetch all questions and their related data
//     $questions = FeedbackQuestion::with('category')->get();
//     $questionsWithSurveyType = $questions->map(function ($question) {
//         return [
//             'id' => $question->id,
//             'question_text' => $question->question_text,
//             'category_id' => $question->category_id,
//             'survey_type' => $question->category->survey_type,
//         ];
//     });

    //     return Excel::download(new SurveyStatsExport($faultysurveyStats, $coursesurveyStats, $questionsWithSurveyType), 'survey_stats.xlsx');
// }

    public function exportSurveyStats_faulty()
    {
        $feedbackResponse = new FeedbackResponse();
        $faultysurveyStats = $feedbackResponse->calculateSurveyTypeStats('faultysurvey');

        // Fetch all questions with their categories
        $questions = FeedbackQuestion::with('category')->get();

        // Map through each question to extract necessary details
        $questionsWithSurveyType = $questions->map(function ($question) {
            return [
                'id' => $question->id,
                'question_text' => $question->question_text,
                'category_id' => $question->category_id,
                'survey_type' => $question->category->survey_type, // Accessing survey_type from category
            ];
        });

        // Initialize an array to hold all data for export
        $exportData = [];

        // Add header row
        $exportData[] = ['Survey Type', 'Category', 'Question Text', 'Option', 'Count'];

        // Add survey stats for 'faultysurvey' and 'coursesurvey'
        foreach (['Faulty Survey' => $faultysurveyStats] as $surveyType => $stats) {
            foreach ($stats['stats'] as $category => $count) {
                $exportData[] = [$surveyType, $category, '', 'stats', $count];
            }

            // Add total unique users row
            $exportData[] = ['Faulty Survey', 'Total Unique Users', '', 'stats', $stats['totalUniqueUsers']];
        }

        // Add question-wise stats, but only for 'faultysurvey'
        foreach ($questionsWithSurveyType as $question) {
            if ($question['survey_type'] === 'faultysurvey') {
                $questionId = $question['id'];
                $surveyType = $question['survey_type'];
                $questionText = $question['question_text'];

                $questionStats = $this->fetchQuestionStats($questionId, $surveyType);

                foreach ($questionStats as $option => $count) {
                    // Skip adding Total Unique Users row within this loop
                    if ($option !== 'totalUniqueUsers') {
                        $exportData[] = ['Faulty Survey', '', $questionText, $option, $count];
                    }
                }
            }
        }

        // Create an export object and return download response
        return Excel::download(new SurveyStatsExport($exportData), 'Faulty_survey_stats.xlsx');
    }

    public function exportSurveyStatsFaultyToPDF()
    {
        $feedbackResponse = new FeedbackResponse();
        $faultysurveyStats = $feedbackResponse->calculateSurveyTypeStats('faultysurvey');

        // Fetch all questions with their categories
        $questions = FeedbackQuestion::with('category')->get();

        // Map through each question to extract necessary details
        $questionsWithSurveyType = $questions->map(function ($question) {
            return [
                'id' => $question->id,
                'question_text' => $question->question_text,
                'category_id' => $question->category_id,
                'survey_type' => $question->category->survey_type, // Accessing survey_type from category
            ];
        });

        // Initialize an array to hold all data for export
        $exportData = [];

        // Add header row
        //$exportData[] = ['Survey Type', 'Category', 'Question Text', 'Option', 'Count'];

        // Add survey stats for 'faultysurvey' and 'coursesurvey'
        foreach (['Faulty Survey' => $faultysurveyStats] as $surveyType => $stats) {
            foreach ($stats['stats'] as $category => $count) {
                $exportData[] = [$surveyType, $category, '', 'stats', $count];
            }

            // Add total unique users row
            $exportData[] = ['Faulty Survey', 'Total Unique Users', '', 'stats', $stats['totalUniqueUsers']];
        }

        // Add question-wise stats, but only for 'faultysurvey'
        foreach ($questionsWithSurveyType as $question) {
            if ($question['survey_type'] === 'faultysurvey') {
                $questionId = $question['id'];
                $surveyType = $question['survey_type'];
                $questionText = $question['question_text'];

                $questionStats = $this->fetchQuestionStats($questionId, $surveyType);

                foreach ($questionStats as $option => $count) {
                    // Skip adding Total Unique Users row within this loop
                    if ($option !== 'totalUniqueUsers') {
                        $exportData[] = ['Faulty Survey', '', $questionText, $option, $count];
                    }
                }
            }
        }

        $pdf = PDF::loadView('pdf.faulty_survey_stats', ['exportData' => $exportData]);
        return $pdf->download('Faulty_survey_stats.pdf');
    }


    public function exportSurveyStats_course()
    {
        $feedbackResponse = new FeedbackResponse();
        $coursesurveyStats = $feedbackResponse->calculateSurveyTypeStats('coursesurvey');

        // Fetch all questions with their categories
        $questions = FeedbackQuestion::with('category')->get();

        // Map through each question to extract necessary details
        $questionsWithSurveyType = $questions->map(function ($question) {
            return [
                'id' => $question->id,
                'question_text' => $question->question_text,
                'category_id' => $question->category_id,
                'survey_type' => $question->category->survey_type, // Accessing survey_type from category
            ];
        });

        // Initialize an array to hold all data for export
        $exportData = [];

        // Add header row
        $exportData[] = ['Survey Type', 'Category', 'Question Text', 'Option', 'Count'];

        // Add survey stats for 'faultysurvey' and 'coursesurvey'
        foreach (['Course Survey' => $coursesurveyStats] as $surveyType => $stats) {
            foreach ($stats['stats'] as $category => $count) {
                $exportData[] = [$surveyType, $category, '', 'stats', $count];
            }

            // Add total unique users row
            $exportData[] = ['Course Survey', 'Total Unique Users', '', 'stats', $stats['totalUniqueUsers']];
        }

        // Add question-wise stats, but only for 'faultysurvey'
        foreach ($questionsWithSurveyType as $question) {
            if ($question['survey_type'] === 'coursesurvey') {
                $questionId = $question['id'];
                $surveyType = $question['survey_type'];
                $questionText = $question['question_text'];

                $questionStats = $this->fetchQuestionStats($questionId, $surveyType);

                foreach ($questionStats as $option => $count) {
                    // Skip adding Total Unique Users row within this loop
                    if ($option !== 'totalUniqueUsers') {
                        $exportData[] = ['Course Survey', '', $questionText, $option, $count];
                    }
                }
            }
        }

        // Create an export object and return download response
        return Excel::download(new SurveyStatsExport($exportData), 'Course_survey_stats.xlsx');
    }


    public function exportSurveyStatsCourseToPDF()
    {
        $feedbackResponse = new FeedbackResponse();
        $coursesurveyStats = $feedbackResponse->calculateSurveyTypeStats('coursesurvey');

        // Fetch all questions with their categories
        $questions = FeedbackQuestion::with('category')->get();

        // Map through each question to extract necessary details
        $questionsWithSurveyType = $questions->map(function ($question) {
            return [
                'id' => $question->id,
                'question_text' => $question->question_text,
                'category_id' => $question->category_id,
                'survey_type' => $question->category->survey_type, // Accessing survey_type from category
            ];
        });

        // Initialize an array to hold all data for export
        $exportData = [];

        // Add survey stats for 'coursesurvey'
        foreach (['Course Survey' => $coursesurveyStats] as $surveyType => $stats) {
            foreach ($stats['stats'] as $category => $count) {
                $exportData[] = [$surveyType, $category, '', 'stats', $count];
            }

            // Add total unique users row
            $exportData[] = ['Course Survey', 'Total Unique Users', '', 'stats', $stats['totalUniqueUsers']];
        }

        // Add question-wise stats, but only for 'coursesurvey'
        foreach ($questionsWithSurveyType as $question) {
            if ($question['survey_type'] === 'coursesurvey') {
                $questionId = $question['id'];
                $surveyType = $question['survey_type'];
                $questionText = $question['question_text'];

                $questionStats = $this->fetchQuestionStats($questionId, $surveyType);

                foreach ($questionStats as $option => $count) {
                    // Skip adding Total Unique Users row within this loop
                    if ($option !== 'totalUniqueUsers') {
                        $exportData[] = ['Course Survey', '', $questionText, $option, $count];
                    }
                }
            }
        }

        $pdf = PDF::loadView('pdf.course_survey_stats', ['exportData' => $exportData]);
        return $pdf->download('Course_survey_stats.pdf');
    }









    public function welcomestudent()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        return view('home.welcomestudent', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions // Pass allowed permissions to the view
        ]);
    }

    public function welcometeacher()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        // Initialize $whatsapp as null or an empty string to avoid errors
        $whatsapp = null;

        if ($user->type == 4) {
            // Fetch data from the teachers table
            $data = Teachercreate::where('userid', $user->id)->first();

            // Check if data exists before accessing its properties
            if ($data) {
                $whatsapp = $data->whatsappnumber;
            }
        }
        return view('home.welcometeacher', [
            'user' => $user,
            'whatsapp' => $whatsapp,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions // Pass allowed permissions to the view
        ]);
    }

    public function welcomeadminuser()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        return view('home.welcomeadminuser', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions // Pass allowed permissions to the view
        ]);
    }

    public function welcomefaulty()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        return view('home.welcomefaulty', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions // Pass allowed permissions to the view
        ]);
    }
}