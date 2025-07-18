<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FeedbackOption;
use InvalidArgumentException;

// FeedbackResponse Model
class FeedbackResponse extends Model
{
    protected $table = 'feedback_responses';
    protected $fillable = ['user_id', 'question_id', 'option_id', 'survey_type'];

    // public function calculateSurveyTypeStats($surveyType)
    // {
    //     // Define custom mappings for option values
    //     $optionMapping = [
    //         1 => 'Very Dissatisfied',
    //         2 => 'Dissatisfied',
    //         3 => 'Neutral',
    //         4 => 'Satisfied',
    //         5 => 'Very Satisfied'
    //         // Add more mappings as needed
    //     ];

    //     // Initialize counters based on the defined categories
    //     $stats = array_fill_keys(array_values($optionMapping), 0);

    //     // Fetch responses for the given survey type
    //     $responses = $this->where('survey_type', $surveyType)->get();

    //     // Track unique users who attempted the survey
    //     $uniqueUsers = [];

    //     foreach ($responses as $response) {
    //         // Add the user_id to the unique users array
    //         if (!in_array($response->user_id, $uniqueUsers)) {
    //             $uniqueUsers[] = $response->user_id;
    //         }

    //         // Get the option value from the FeedbackOption model
    //         $optionValue = FeedbackOption::where('id', $response->option_id)->value('value');

    //         // Map the option value to the corresponding category and increment the counter
    //         if (array_key_exists($optionValue, $optionMapping)) {
    //             $category = $optionMapping[$optionValue];
    //             $stats[$category]++;
    //         }
    //     }

    //     // Get the total number of unique users who attempted this survey type
    //     $totalUniqueUsers = count($uniqueUsers);

    //     return [
    //         'stats' => $stats,
    //         'totalUniqueUsers' => $totalUniqueUsers,
    //     ];
    // }


    // public function calculateSurveyTypeStats($surveyType, $questionId = null)
    // {
    //     // Query the FeedbackResponse table filtering by survey_type and optionally by question_id
    //     $query = FeedbackResponse::where('survey_type', $surveyType);

    //     if ($questionId) {
    //         $query->where('question_id', $questionId);
    //     }

    //     // Get the results
    //     $responses = $query->get();

    //     // Initialize an array to store the stats
    //     $stats = [
    //         'Very Dissatisfied' => 0,
    //         'Dissatisfied' => 0,
    //         'Neutral' => 0,
    //         'Satisfied' => 0,
    //         'Very Satisfied' => 0,
    //     ];

    //     // Initialize a variable to store unique user count
    //     $uniqueUsers = [];

    //     // Loop through the responses to calculate stats
    //     foreach ($responses as $response) {
    //         // Get the option value from the feedback_option table
    //         $optionValue = FeedbackOption::where('id', $response->option_id)->value('value');

    //         // Map the option value to the corresponding stat category
    //         switch ($optionValue) {
    //             case 1:
    //                 $stats['Very Dissatisfied']++;
    //                 break;
    //             case 2:
    //                 $stats['Dissatisfied']++;
    //                 break;
    //             case 3:
    //                 $stats['Neutral']++;
    //                 break;
    //             case 4:
    //                 $stats['Satisfied']++;
    //                 break;
    //             case 5:
    //                 $stats['Very Satisfied']++;
    //                 break;
    //         }

    //         // Track unique users
    //         $uniqueUsers[$response->user_id] = true;
    //     }

    //     return [
    //         'stats' => $stats,
    //         'totalUniqueUsers' => count($uniqueUsers),
    //     ];
    // }

    public function calculateSurveyTypeStats($surveyType, $questionId = null)
{
    // Define the stats categories based on survey type
    $categories = [
        'faultysurvey' => [
            'Very Dissatisfied' => 0,
            'Dissatisfied' => 0,
            'Neutral' => 0,
            'Satisfied' => 0,
            'Very Satisfied' => 0,
        ],
        'coursesurvey' => [
            'Strongly Disagree' => 0,
            'Disagree' => 0,
            'Uncertain' => 0,
            'Agree' => 0,
            'Strongly Agree' => 0,
        ],
    ];

    // Check if survey type exists in categories
    if (!isset($categories[$surveyType])) {
        throw new InvalidArgumentException('Invalid survey type');
    }

    // Initialize the stats array based on the survey type
    $stats = $categories[$surveyType];

    // Query the FeedbackResponse table filtering by survey_type and optionally by question_id
    $query = FeedbackResponse::where('survey_type', $surveyType);

    if ($questionId) {
        $query->where('question_id', $questionId);
    }

    // Get the results
    $responses = $query->get();

    // Initialize a variable to store unique user count
    $uniqueUsers = [];

    // Define a mapping for option values to categories
    $valueMapping = [
        'faultysurvey' => [
            1 => 'Very Dissatisfied',
            2 => 'Dissatisfied',
            3 => 'Neutral',
            4 => 'Satisfied',
            5 => 'Very Satisfied',
        ],
        'coursesurvey' => [
            1 => 'Strongly Disagree',
            2 => 'Disagree',
            3 => 'Uncertain',
            4 => 'Agree',
            5 => 'Strongly Agree',
        ],
    ];

    // Get the mapping for the current survey type
    $mapping = $valueMapping[$surveyType];

    // Loop through the responses to calculate stats
    foreach ($responses as $response) {
        // Get the option value from the feedback_option table
        $optionValue = FeedbackOption::where('id', $response->option_id)->value('value');

        // Map the option value to the corresponding stat category
        if (isset($mapping[$optionValue])) {
            $stats[$mapping[$optionValue]]++;
        }

        // Track unique users
        $uniqueUsers[$response->user_id] = true;
    }

    return [
        'stats' => $stats,
        'totalUniqueUsers' => count($uniqueUsers),
    ];
}


}
