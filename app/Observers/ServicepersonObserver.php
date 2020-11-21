<?php

namespace App\Observers;

use App\Models\Authentication\User;
use App\Models\Serviceperson\Serviceperson;
use App\Notifications\ServicepersonCreatedNotification;
use Approval\Models\Approval;
use Illuminate\Support\Facades\Notification;


class ServicepersonObserver
{
    /**
     * Handle the serviceperson "created" event.
     *
     * @param Serviceperson $serviceperson
     * @return void
     */
    public function saved(Serviceperson $serviceperson)
    {


    }

    /**
     * Handle the serviceperson "created" event.
     *
     * @param Serviceperson $serviceperson
     * @return void
     */
    public function created(Serviceperson $serviceperson)
    {
        $superAdmins = User::wherehas('roles', function ($query) {
            $query->where('id',1);
        })->get();

       Notification::send($superAdmins, new ServicepersonCreatedNotification($serviceperson));

    }

    /**
     * Handle the serviceperson "updating" event.
     *
     * @param Serviceperson $serviceperson
     */
    public function updating(Serviceperson $serviceperson)
    {

        foreach ($serviceperson->emailAddresses as $emailAddress){
            if ($emailAddress->email->isDirty()){
                $serviceperson->user()->update([
                    'email' => $emailAddress
                ]);
            }
        }

    }

    /**
     * Handle the serviceperson "updated" event.
     *
     * @param Serviceperson $serviceperson
     * @param Approval $approval
     * @return void
     */
    public function updated(Serviceperson $serviceperson)
    {


    }

    /**
     * Handle the serviceperson "deleted" event.
     *
     * @param Serviceperson $serviceperson
     * @return void
     */
    public function deleted(Serviceperson $serviceperson)
    {
        //
    }

    /**
     * Handle the serviceperson "restored" event.
     *
     * @param Serviceperson $serviceperson
     * @return void
     */
    public function restored(Serviceperson $serviceperson)
    {
        //
    }

    /**
     * Handle the serviceperson "force deleted" event.
     *
     * @param Serviceperson $serviceperson
     * @return void
     */
    public function forceDeleted(Serviceperson $serviceperson)
    {
        //
    }
}
