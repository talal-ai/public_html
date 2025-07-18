<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationTeacher extends Model
{
    use HasFactory;

    protected $table = 'notifications_teacher';

    protected $fillable = [
        'user_id',
        'teacher_id',
        'title',
        'message',
        'status',
        'read'
    ];

    protected $casts = [
        'read_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
