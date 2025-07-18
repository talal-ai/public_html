<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Studentcreate extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'students';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'userid',
        'whatsapp',
        'program',
        'session',
        'year',
        'batch',
        'gender',
        'classrollno',
        'studnetcnic',
        'studnetdob',
        'datetojoin',
        'domicile',
        'migrationcollege',
        'studentaddress',
        'fathername',
        'fathercnic',
        'fatherwhatsapp',
        'ssctitle',
        'matricrollno',
        'matricyear',
        'matricregisno',
        'matrictotalmarks',
        'matricobtainmarks',
        'matricboard',
        'hssctitle',
        'interrollno',
        'interyear',
        'interregisno',
        'intertotalmarks',
        'interobtainmarks',
        'interboard',
        'entrytestobtmarks',
        'entrytesttype',
        'entrytestpassyear',
        'testbody',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function program()
    {
        return $this->belongsTo(Programcreate::class, 'program');
    }

    // Define the relationship with Notificationyear
    public function Notificationyear()
    {
        return $this->hasMany(Notificationyear::class, 'user_id', 'userid');
    }
}
