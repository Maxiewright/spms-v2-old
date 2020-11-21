<?php

namespace App\Policies\Serviceperson;

use App\Models\Authentication\User;
use App\Models\Serviceperson\EmergencyContact;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmergencyContactPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->hasRole('super-admin')){
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param EmergencyContact $emergencyContact
     * @return mixed
     */
    public function view(User $user, EmergencyContact $emergencyContact)
    {
        if ($user->can('view-record-card')){
            return true;
        }

        if ($user->can('view-emergency-contact')){
            return true;
        }

        $user->has('emergencyContacts', $emergencyContact);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->can('create-record-card')){
            return true;
        }

        if ($user->can('create-emergency-contact')){
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param EmergencyContact $emergencyContact
     * @return mixed
     */
    public function update(User $user, EmergencyContact $emergencyContact)
    {
        if ($user->can('update-record-card')){
            return true;
        }

        if ($user->can('update-emergency-contact')){
            return true;
        }

        $user->has('emergencyContacts', $emergencyContact);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param EmergencyContact $emergencyContact
     * @return mixed
     */
    public function delete(User $user, EmergencyContact $emergencyContact)
    {
        if ($user->can('delete-record-card')){
            return true;
        }

        if ($user->can('delete-emergency-contact')){
            return true;
        }

        $user->has('emergencyContacts', $emergencyContact);

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param EmergencyContact $emergencyContact
     * @return mixed
     */
    public function restore(User $user, EmergencyContact $emergencyContact)
    {
        if ($user->can('restore-record-card')){
            return true;
        }

        if ($user->can('restore-emergency-contact')){
            return true;
        }

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param EmergencyContact $emergencyContact
     * @return mixed
     */
    public function forceDelete(User $user, EmergencyContact $emergencyContact)
    {
        if ($user->can('force-delete-record-card')){
            return true;
        }

        if ($user->can('force-delete-emergency-contact')){
            return true;
        }

    }
}
