<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ServicepersonCreatedNotification extends Notification
{
    use Queueable;

    private $serviceperson;

    /**
     * Create a new notification instance.
     *
     * @param $serviceperson
     */
    public function __construct($serviceperson)
    {
        //
        $this->serviceperson = $serviceperson;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
       return ['database'];;
    }

    public function toDatabase()
    {
        return [
            'name' => $this->serviceperson->number.' '.$this->serviceperson->first_name.' '.$this->serviceperson->last_name,
            'creator' => $this->serviceperson->created_by,
            'date' => $this->serviceperson->created_at,
        ];
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
            //
        ];
    }
}
