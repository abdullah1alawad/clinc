<?php

namespace App\Listeners;

use App\Events\ProcessRejected;
use App\Models\User;
use App\Notifications\ProcessAcceptedNotification;
use App\Notifications\ProcessRejectedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendProcessRejectedNotification
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
    public function handle(ProcessRejected $event): void
    {
        $student = User::find($event->process->student_id);

        Notification::send($student,new ProcessRejectedNotification($event->process));
    }
}
