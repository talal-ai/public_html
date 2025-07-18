<?php

namespace App\Events;

use App\Models\Notification;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class YearNotificationSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $studentId;
    public $yearId;

    public function __construct($studentId, $yearId)
    {
        // Log the values right when they are passed into the constructor
        Log::info('YearNotificationSent event constructed:', [
            'studentId' => $studentId,
            'yearId' => $yearId,
        ]);
        $this->studentId = $studentId;
        $this->yearId = $yearId;
    }

    public function broadcastOn()
    {
        Log::info('Inside broadcastOn method.');
        Log::info('Broadcasting on channel:', [
            'channel' => "year-notification.{$this->studentId}",
            'studentId' => $this->studentId,
        ]);
        return new PrivateChannel("year-notification.{$this->studentId}");
    }
}

