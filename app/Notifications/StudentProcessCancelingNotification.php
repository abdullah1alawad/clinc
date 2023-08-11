<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StudentProcessCancelingNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $process;
    public $user_type;

    public function __construct($process, $user_type)
    {
        $this->process = $process;
        $this->user_type = $user_type;
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
        if($this->user_type=='student') {
            return [
                'title' => 'process canceled',
                'how' => 'Student (' . $this->process->student->name . ')',
                'process' => $this->process,
            ];
        }
        else if($this->user_type=='doctor') {
            return [
                'title' => 'process canceled',
                'how' => 'Doctor (' . $this->process->doctor->name . ')',
                'process' => $this->process,
            ];
        }
        else {
            return [
                'title' => 'process canceled',
                'how' => 'Admins',
                'process' => $this->process,
            ];
        }
    }
}
