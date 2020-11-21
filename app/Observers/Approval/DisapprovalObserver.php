<?php

namespace App\Observers\Approval;

use App\Models\Authentication\User;
use App\Notifications\Approval\DisapprovalNotification;
use Approval\Models\Disapproval;
use Illuminate\Support\Facades\Notification;

class DisapprovalObserver
{
    /**
     * Handle the disapproval "created" event.
     *
     * @param Disapproval $disapproval
     * @return void
     */
    public function created(Disapproval $disapproval)
    {
        $user = User::find(1);
        Notification::send($user, new DisapprovalNotification($disapproval));
    }

}
