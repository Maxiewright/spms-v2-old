<?php

namespace App\Observers;

use App\Models\Serviceperson\EmailAddress;

class EmailAddressObserver
{
    /**
     * Handle the email address "created" event.
     *
     * @param EmailAddress $emailAddress
     * @return void
     */
    public function created(EmailAddress $emailAddress)
    {

    }

    /**
     * Handle the email address "updated" event.
     *
     * @param EmailAddress $emailAddress
     * @return void
     */
    public function updated(EmailAddress $emailAddress)
    {
        $user =  $emailAddress->serviceperson->first()->user();
        if ($emailAddress->isDirty('email')){
            $user->update([
                'email' => $emailAddress->email
            ]);
        }
    }

    /**
     * Handle the email address "deleted" event.
     *
     * @param EmailAddress $emailAddress
     * @return void
     */
    public function deleted(EmailAddress $emailAddress)
    {
        //
    }

    /**
     * Handle the email address "restored" event.
     *
     * @param EmailAddress $emailAddress
     * @return void
     */
    public function restored(EmailAddress $emailAddress)
    {
        //
    }

    /**
     * Handle the email address "force deleted" event.
     *
     * @param EmailAddress $emailAddress
     * @return void
     */
    public function forceDeleted(EmailAddress $emailAddress)
    {
        //
    }
}
