<?php

namespace App\Http\Livewire\Notifications\Approval;

use Livewire\Component;

class ModificationNotificationComponent extends Component
{
    public $notifications ;

    public function mount()
    {
        $this->notifications = auth()->user()->notifications;
    }



    public function render()
    {
        return view('livewire.notifications.approval.modification-notification-component');
    }
}
