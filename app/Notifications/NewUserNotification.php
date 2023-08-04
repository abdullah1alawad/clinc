<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
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
    public function toArray($notifiable): array
    {
        if ($this->user->roles[0]->id == 3) {
            return [
                'user' => 'Doctor',
                'user_name' => $this->user->name,
                'user_email' => $this->user->email,
                'user_id' => $this->user->id,
            ];
        } else if ($this->user->roles[0]->id == 2) {
            return [
                'user' => 'Student',
                'user_name' => $this->user->name,
                'user_email' => $this->user->email,
                'user_id' => $this->user->id,
            ];
        } else {
            return [
                'user' => 'Assistant',
                'user_name' => $this->user->name,
                'user_email' => $this->user->email,
                'user_id' => $this->user->id,
            ];
        }
    }
}
