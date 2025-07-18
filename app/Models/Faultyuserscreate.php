<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Faultyuserscreate extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'faultyusers';
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
        'picture',
        'bankaccount',
        'eobiaccount',
        'paypackage',
        'registrationnumber',
        'licenseissuedate',
        'licenseexpirydate',
        'dateofbirth',
        'cnic',
        'dateofjoining',
        'tentativedate',
        'degreename',
        'degreeuniversity',
        'degreepassing',
        'degreename1',
        'degreeuniversity1',
        'degreepassing1',
        'degreename2',
        'degreeuniversity2',
        'degreepassing2',
        'diplomaname',
        'diplomauniversity',
        'diplomapassing',
        'diplomaname1',
        'diplomauniversity1',
        'diplomapassing1',
        'diplomaname2',
        'diplomauniversity2',
        'diplomapassing2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }
}
