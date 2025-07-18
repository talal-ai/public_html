<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Quizuseranswer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'quiz_user_answer';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'quiz_result_id',
        'question_id',
        'selected_answer',
        'correct_answer',
        'marks',
    ];


     // Define the relationship with QuizResult
     public function quizResult()
     {
         return $this->belongsTo(Quizresult::class, 'quiz_result_id');
     }

}
