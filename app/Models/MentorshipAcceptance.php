<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MentorshipAcceptance extends Model
{
    protected $table = 'mentorship_acceptance';

    protected $fillable = [
        'userid',
        'usertype',
    ];

    public $timestamps = true;
}
