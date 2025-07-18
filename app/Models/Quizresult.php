<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Quizresult extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'quiz_results';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'quiz_id',
        'user_id',
        'start_date',
        'end_date',
        'totalquestion_number',
        'percentage',
        'obtain_percentage',
        'quiz_time',
        'quizstartTime',
        'status',
    ];


    // Define the relationship with UserAnswer
    public function userAnswers()
    {
        return $this->hasMany(Quizuseranswer::class, 'quiz_result_id');
    }

}
