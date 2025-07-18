<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Addnewquestionoption extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'quiz_question_option';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'question_id',
        'option_name',
        'correct_value',
    ];

    // Inverse relationship with quiz_question
    public function question()
    {
        return $this->belongsTo(Addnewquestion::class, 'question_id');
    }

    
}
