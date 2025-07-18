<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Subjectcreate extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'subjects';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
        'subjectprogram',
        'subjectyear',
        'subjecttype',
        'status',
        'description',
    ];

    public function program()
{
    return $this->belongsTo(Programcreate::class, 'subjectprogram', 'id');
}

    public function year()
    {
        return $this->belongsTo(Yearcreate::class, 'subjectyear', 'id');
    }

}
