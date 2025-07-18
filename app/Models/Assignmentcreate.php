<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Assignmentcreate extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'assignments';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'totalmarks',
        'topic',
        'assignmentfile',
        'program_id',
        'year_id',
        'subject_id',
        'assignmentdetail',
        'type',
        'status',
    ];

}
