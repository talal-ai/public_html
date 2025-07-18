<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Message extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'message';

    protected $fillable = [
        'id',
        'conversation_id',
        'sender_id',
        'receiver_id',
        'read_at',
        'receiver_deleted_at',
        'sender_deleted_at',
        'body',
    ];

    protected $dates = ['read_at', 'receiver_deleted_at', 'sender_deleted_at'];

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    public function isRead(): bool
    {
        return $this->read_at != null;
    }

}
