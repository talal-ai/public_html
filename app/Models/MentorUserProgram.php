<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class MentorUserProgram extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'mentor_user_program';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'user_id',
        'program_id',
        'created_by',
    ];
    public function program()
    {
        return $this->belongsTo(Programcreate::class, 'program_id'); // Assuming 'program_id' is the foreign key
    }

}
