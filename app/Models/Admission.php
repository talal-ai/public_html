<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admission extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'applications';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'userid',
        'sessionid',
        'name',
        'selected_program',
        'selected_type',
        'phone',
        'cnic',
        'city',
        'fathername',
        'fatherphone',
        'fathercnic',
        'fatheremail',
        'totalmarks',
        'obtainmarks',
        'year',
        'board',
        'fsctotalmarks',
        'fscobtainmarks',
        'fscbiomarks',
        'fscchemistrymarks',
        'fscphymarks',
        'fscyear',
        'fscboard',
        'etobtainmarks',
        'ettype',
        'etpassingyear',
        'ettestingbody',
    ];
}
