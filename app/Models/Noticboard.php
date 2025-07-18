<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Noticboard extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'noticboard';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'message',
        'subject_title',
        'filename',
        'created_by',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function attachments()
    {
        return $this->hasMany(Noticboardattachment::class, 'noticboard_id');
    }

}
