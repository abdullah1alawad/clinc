<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AssistantNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    public $process;

    public function __construct($process)
    {
        $this->process = $process;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $doctor_name = $this->process->doctor->name;
        $doctor_id = $this->process->doctor_id;

        $student_name = $this->process->student->name;
        $student_id = $this->process->student_id;

        $patient_name = $this->process->patient->name;
        $patient_id = $this->process->patient_id;

        $chair_id = $this->process->chair_id;

        $subject_name = $this->process->subject->name;

        $date = $this->process->date;

        return [
            'doctor_name' => $doctor_name,
            'doctor_id' => $doctor_id,
            'student_name' => $student_name,
            'student_id' => $student_id,
            'patient_name' => $patient_name,
            'patient_id' => $patient_id,
            'chair_id' => $chair_id,
            'subject_name' => $subject_name,
            'date' => $date,
        ];
    }
}
