<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Videocreate extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'videos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'videotitle',
        'video_id',
        'program_id',
        'year_id',
        'teacher_id',
        'created_by',
        'description',
        'status',
    ];
}
