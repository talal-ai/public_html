<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Quizcreate extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'quiz';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'start_date',
        'end_date',
        'program_id',
        'quiz_title',
        'quiz_instruction',
        'year_id',
        'quiz_type',
        'group_id',
        'percentage',
        'quiztime',
        'totalquestion',
        'totalquestion_number',
        'set_default_setting',
        'see_ans_sheet',
        'show_corr_anssheet',
        'show_wrong_anssheet',
        'random_question',
        'created_by',
    ];

}
