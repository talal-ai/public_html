<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Teachercreate extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'teachers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'userid',
        'latestqualification',
        'pmdcnumber',
        'whatsappnumber',
        'employeeid',
        'program',
        'year',
        'subject',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function program()
    {
        return $this->belongsTo(Programcreate::class, 'program');
    }
}
