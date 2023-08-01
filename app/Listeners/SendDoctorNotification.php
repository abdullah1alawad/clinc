<?php

namespace App\Listeners;

use App\Events\ProcessCreated;
use App\Models\User;
use App\Notifications\NewProcessNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendDoctorNotification
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
    public function handle(ProcessCreated $event): void
    {
        $doctor=User::find($event->process->doctor_id);

        Notification::send($doctor,new NewProcessNotification($event->process));

    }
}
