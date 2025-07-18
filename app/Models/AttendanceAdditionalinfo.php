<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AttendanceAdditionalinfo extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'attendance_additional_info';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'attendance_id',
        'student_id',
        'student_rollno',
        'attendance',
    ];

}
