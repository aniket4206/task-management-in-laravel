<?php

namespace App\Notifications;

use App\Listeners\SendNewUserNotification;
use App\Models\Todo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notifiable;



class TaskReminder extends Notification
{
    use Queueable, Notifiable;
    public $todo;



    /**
     * Create a new notification instance.
     */
    public function __construct($todo)
    {
        //

        $this->todo = $todo;
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

    public function toArray(object $notifiable): array
    {
        return [
            'id' => $this->todo['id'],
            'name' => $this->todo['task_name'],
            'status' => $this->todo['task_status'],
        ];
    }
}
