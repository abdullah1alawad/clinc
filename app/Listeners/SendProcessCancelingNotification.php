<?php

namespace App\Listeners;

use App\Events\StudentProcessCanceling;
use App\Models\User;
use App\Notifications\AssistantNotification;
use App\Notifications\ProcessAcceptedNotification;
use App\Notifications\StudentProcessCancelingNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendProcessCancelingNotification
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
    public function handle(StudentProcessCanceling $event): void
    {
        if ($event->user_type == 'student') {
            $doctor = User::find($event->process->doctor_id);
            $assistant = User::find($event->process->assistant_id);

            Notification::send($doctor, new StudentProcessCancelingNotification($event->process, $event->user_type));
            Notification::send($assistant, new StudentProcessCancelingNotification($event->process, $event->user_type));
        } else if ($event->user_type == 'doctor') {
            $student = User::find($event->process->student_id);
            $assistant = User::find($event->process->assistant_id);

            Notification::send($student, new StudentProcessCancelingNotification($event->process, $event->user_type));
            Notification::send($assistant, new StudentProcessCancelingNotification($event->process, $event->user_type));
        } else {
            $student = User::find($event->process->student_id);
            $doctor = User::find($event->process->doctor_id);
            $assistant = User::find($event->process->assistant_id);

            Notification::send($student, new StudentProcessCancelingNotification($event->process, $event->user_type));
            Notification::send($doctor, new StudentProcessCancelingNotification($event->process, $event->user_type));
            Notification::send($assistant, new StudentProcessCancelingNotification($event->process, $event->user_type));
        }
    }
}
