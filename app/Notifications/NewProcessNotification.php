<?php

namespace App\Notifications;

use App\Models\Patient;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewProcessNotification extends Notification
{
    use Queueable;

    protected $process;
    /**
     * Create a new notification instance.
     */
    public function __construct($process)
    {
        $this->process=$process;
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
        $student=User::find($this->process->student_id);
        $patient=Patient::find($this->process->patient_id);
        $subject=Subject::find($this->process->subject_id);
        $date=$this->process->date;
        $photo=$this->process->photo;

        return [
            'process_id'=>$this->process->id,
            'student'=>$student->name,
            'student_id'=>$student->id,
            'patient'=>$patient->name,
            'patient_id'=>$patient->id,
            'subject'=>$subject->name,
            'chair_id'=>$this->process->chair_id,
            'date'=>$date,
            'photo'=>$photo,
        ];
    }
}
