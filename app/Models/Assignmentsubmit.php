<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Assignmentsubmit extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'assignment_submit';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'user_id',
        'assignment_id',
        'totalmarks',
        'obtain_marks',
        'submit_date',
        'marks_date',
        'marks_assign_user_id',
        'assignmentfile',
    ];

}
