<?php

namespace App\Notifications\Approval;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DisapprovalNotification extends Notification
{
    use Queueable;

    private $disapproval;

    /**
     * Create a new notification instance.
     *
     * @param $disapproval
     */
    public function __construct($disapproval)
    {
        $this->disapproval = $disapproval;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $model = implode(' ', preg_split('/(?=[A-Z])/', class_basename($this->disapproval->modifiable), -1, PREG_SPLIT_NO_EMPTY));
        return [
            'creator' => $this->disapproval->modifier->serviceperson->name,
            'model' =>  $model,
            'created_for' => $this->disapproval->modifiable->serviceperson->name,
            'created_on' => $this->disapproval->created_at->format('d M Y'),
        ];
    }
}
