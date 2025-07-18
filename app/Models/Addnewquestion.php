<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Addnewquestion extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'quiz_question';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'questiongroupid',
        'questiontype',
        'shuffleanswer',
        'marks',
        'questiondetail',
        'numberofoption',
        'created_by',
    ];

    // Relationship with quiz_question_option
    public function options()
    {
        return $this->hasMany(Addnewquestionoption::class, 'question_id');
    }

    // Addnewquestion.php
    public function questionGroup()
    {
        return $this->belongsTo(Addnewquestiongroup::class, 'questiongroupid');
    }
    
    // Addnewquestion.php
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
