<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackQuestion extends Model
{
    protected $table = 'feedback_questions';

    protected $fillable = ['category_id ', 'question_text'];

    public function category()
    {
        return $this->belongsTo(FeedbackCategory::class, 'category_id');
    }

    public function options()
    {
        return $this->hasMany(FeedbackOption::class, 'question_id');
    }
}
