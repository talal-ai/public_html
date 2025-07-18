<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Adminuserscreate extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'adminusers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'userid',
        'designation',
        'department',
        'whatsapp',
        'address',
        'paypackage',
        'leaveallocated',
        'leaveavailed',
        'shortleaveavailed',
        'latestdegree',
        'latestdegreeuniversity',
        'latestdegreepassing',
        'degreename',
        'degreeuniversity',
        'degreepassing',
        'diplomaname',
        'diplomauniversity',
        'diplomapassing',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }
}
