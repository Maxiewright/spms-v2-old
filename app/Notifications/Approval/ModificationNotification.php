<?php

namespace App\Notifications\Approval;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ModificationNotification extends Notification
{
    use Queueable;

    private $modification;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($modification)
    {
        $this->modification = $modification;
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
        return [
            'modification_id' => $this->modification->id,
            'creator' => $this->modification->modifier->serviceperson->name,
            'model' =>  $this->modification->modifiable_type,
            'created_on' => $this->modification->created_at->format('d M Y'),
        ];
    }

}
