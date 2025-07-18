<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SendRequestByTeacher extends Model
{
    protected $table = 'send_request_by_teacher';
    
    protected $fillable = [
        'userid',
        'teacherid',
        'message',
        'accepted',
        'rejected',
        'fromdate',
        'todate',
    ];
}
