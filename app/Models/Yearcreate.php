<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Yearcreate extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'years';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'class',
        'code',
        'program',
        'acadamicyear',
        'description',
        'status',
    ];

    public function program()
    {
        return $this->belongsTo(Programcreate::class, 'program', 'id');
    }
}
