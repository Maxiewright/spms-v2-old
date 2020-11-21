<?php

namespace App\Notifications\Approval;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApprovalNotification extends Notification
{
    use Queueable;

    private $approval;

    /**
     * Create a new notification instance.
     *
     * @param $approval
     */
    public function __construct($approval)
    {
        $this->approval = $approval;
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
        $model = implode(' ', preg_split('/(?=[A-Z])/', class_basename($this->approval->modifiable), -1, PREG_SPLIT_NO_EMPTY));
        return [
            'creator' => $this->approval->modifier->serviceperson->name,
            'model' =>  $model,
            'created_for' => $this->approval->modifiable->serviceperson->name,
            'created_on' => $this->approval->created_at->format('d M Y'),
        ];
    }
}
