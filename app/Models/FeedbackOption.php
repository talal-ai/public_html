<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackOption extends Model
{
    protected $table = 'feedback_options';

    public function question()
    {
        return $this->belongsTo(FeedbackQuestion::class, 'question_id');
    }
}
