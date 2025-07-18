<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Attendance extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'attendance';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'programid',
        'yearid',
        'batchid',
        'subjectid',
        'lecturetype',
        'venueid',
        'device_sn',
        'assigntoteacherid',
        'coteacherid',
        'reason',
        'date',
        'starttime',
        'endtime',
        'createby',
    ];

}
