<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackAdditionalResponse extends Model
{
    protected $table = 'feedback_additional_responses';
    protected $fillable = [
        'user_id', 
        'name', 
        'year_of_study', 
        'gender', 
        'age', 
        'date', 
        'psbfs', 
        'sib',
        'survey_type'
    ];
}
