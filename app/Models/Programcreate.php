<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Programcreate extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'programs';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    public function years()
    {
        // Define the inverse relationship with the Yearcreate model
        return $this->hasMany(Yearcreate::class, 'program', 'id');
    }
}
