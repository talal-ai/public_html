<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\FeedbackCategory;
use App\Models\FeedbackResponse;
use App\Models\FeedbackAdditionalResponse;
class FeedbackController extends Controller
{
    public function courseevaluation()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        return view('home.courseevaluation', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions // Pass allowed permissions to the view
        ]);
    }

    public function facultysurvey()
    {
        // Fetch categories with related questions and options
        // $categories = FeedbackCategory::with(['questions.options'])->get();
        // Fetch only the categories that belong to the 'facultysurvey' type
        $categories = FeedbackCategory::with(['questions.options'])
            ->where('survey_type', 'facultysurvey')
            ->get();
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        return view('home.facultysurvey', [
            'categories' => $categories, // Pass categories to the view
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions // Pass allowed permissions to the view
        ]);
    }

    public function showSurvey($surveyType)
    {
        // Fetch categories that belong to the specified survey type
        $categories = FeedbackCategory::with(['questions.options'])
            ->where('survey_type', $surveyType)
            ->get();

        $user = Auth::user();
        $allowedPermissions = $user->permissions()->pluck('name')->toArray();

        // Determine the view to return based on the survey type
        $view = $surveyType === 'coursesurvey' ? 'home.courseevaluation' : 'home.facultysurvey';

        return view($view, [
            'categories' => $categories,
            'user' => $user,
            'userStatus' => $user->status,
            'allowedPermissions' => $allowedPermissions,
            'surveyType' => $surveyType, // Pass survey type to view
        ]);
    }

    public function storeSurveyResponses(Request $request)
    {
        $responses = $request->input('responses'); // Get the submitted responses
        $surveyType = $request->input('survey_type');

        foreach ($responses as $questionId => $optionId) {
            // Store each response in the database
            FeedbackResponse::create([
                'user_id' => Auth::id(),         // The ID of the authenticated user
                'question_id' => $questionId,    // The ID of the question
                'option_id' => $optionId,        // The ID of the selected option
                'survey_type' => $surveyType, // Now storing survey_type
                'created_at' => now(),           // Timestamp
                'updated_at' => now()            // Timestamp
            ]);
        }

        // Additional feedback ko save karein
        FeedbackAdditionalResponse::create([
            'user_id' => Auth::id(),
            'name' => $request->input('name'),
            'year_of_study' => $request->input('year_of_study'),
            'gender' => $request->input('gender'),
            'age' => $request->input('age'),
            'date' => $request->input('date'),
            'psbfs' => $request->input('psbfs'),
            'sib' => $request->input('sib'),
            'survey_type' => $surveyType, // Now storing survey_type
        ]);

        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }




}
