<?php

namespace App\Listeners;

use App\Events\ProcessAccepted;
use App\Models\User;
use App\Notifications\ProcessAcceptedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use Illuminate\Queue\InteractsWithQueue;

class SendProcessAcceptedNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProcessAccepted $event): void
    {
        $student = User::find($event->process->student_id);

        Notification::send($student,new ProcessAcceptedNotification($event->process));
    }
}
