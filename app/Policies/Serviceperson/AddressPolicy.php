<?php

namespace App\Policies\Serviceperson;

use App\Models\Authentication\User;
use App\Models\Serviceperson\Address;
use Illuminate\Auth\Access\HandlesAuthorization;

class AddressPolicy
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
     * @param Address $address
     * @return mixed
     */
    public function view(User $user, Address $address)
    {
       if ($user->can('view-record-card')){
           return true;
       }

        if ($user->can('view-contact-information')){
            return true;
        }

        return $user->serviceperson->address = $address;
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

        if ($user->can('create-contact-information')){
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Address $address
     * @return mixed
     */
    public function update(User $user, Address $address)
    {
        if ($user->can('update-record-card')){
            return true;
        }

        if ($user->can('update-contact-information')){
            return true;
        }

        return $user->hasModel('addresses', $address);

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Address $address
     * @return mixed
     */
    public function delete(User $user, Address $address)
    {
        if ($user->can('delete-record-card')){
            return true;
        }

        if ($user->can('delete-contact-information')){
            return true;
        }

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Address $address
     * @return mixed
     */
    public function restore(User $user, Address $address)
    {
        if ($user->can('restore-record-card')){
            return true;
        }

        if ($user->can('restore-contact-information')){
            return true;
        }

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Address $address
     * @return mixed
     */
    public function forceDelete(User $user, Address $address)
    {
        if ($user->can('force-delete-record-card')){
            return true;
        }

        if ($user->can('force-delete-contact-information')){
            return true;
        }

    }
}