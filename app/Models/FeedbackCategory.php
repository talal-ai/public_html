<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackCategory extends Model
{
    protected $table = 'feedback_categories';

    // Allowing mass assignment for 'name' and 'survey_type' fields
    protected $fillable = ['name', 'survey_type'];

    public function questions()
    {
        return $this->hasMany(FeedbackQuestion::class, 'category_id');
    }
}
