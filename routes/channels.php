<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('year-notification.{studentId}', function ($user, $studentId) {
    return (int) $user->id === (int) $studentId;
});
