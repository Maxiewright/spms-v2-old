<?php

namespace App\Observers\Approval;

use App\Models\Authentication\User;
use App\Notifications\Approval\ApprovalNotification;
use Approval\Models\Approval;
use Illuminate\Support\Facades\Notification;

class ApprovalObserver
{
    /**
     * Handle the approval "created" event.
     *
     * @param Approval $approval
     * @return void
     */
    public function updating(Approval $approval)
    {
        $user = User::find(1);

        Notification::send($user, new ApprovalNotification($approval));
    }

}
