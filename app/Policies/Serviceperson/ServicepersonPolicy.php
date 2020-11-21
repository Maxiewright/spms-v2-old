<?php

namespace App\Policies\Serviceperson;

use App\Models\Authentication\User;
use App\Models\Serviceperson\Serviceperson;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicepersonPolicy
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
     * @param Serviceperson $serviceperson
     * @return mixed
     */
    public function view(User $user, Serviceperson $serviceperson)
    {
        if ($user->can('view-record-card')){
            return true;
        }

        if ($user->can('view-personal-information')){
            return true;
        }

        return $user->serviceperson == $serviceperson;
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

        if ($user->can('create-personal-information')){
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Serviceperson $serviceperson
     * @return mixed
     */
    public function update(User $user, Serviceperson $serviceperson)
    {
        if ($user->can('update-record-card')){
            return true;
        }

        if ($user->can('update-personal-information')){
            return true;
        }

        return $user->serviceperson == $serviceperson;
    }

    /**
     * Determine whether the user can serviceperson status
     *
     * @param User $user
     * @param Serviceperson $serviceperson
     * @return bool
     */
    public function updateStatus(User $user, Serviceperson $serviceperson)
    {
        if ($user->can('change-serviceperson-status')){
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Serviceperson $serviceperson
     * @return mixed
     */
    public function delete(User $user, Serviceperson $serviceperson)
    {
        if ($user->can('delete-record-card')){
            return true;
        }

        if ($user->can('delete-personal-information')){
            return true;
        }

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Serviceperson $serviceperson
     * @return mixed
     */
    public function restore(User $user, Serviceperson $serviceperson)
    {
        if ($user->can('restore-record-card')){
            return true;
        }

        if ($user->can('restore-personal-information')){
            return true;
        }

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Serviceperson $serviceperson
     * @return mixed
     */
    public function forceDelete(User $user, Serviceperson $serviceperson)
    {
        if ($user->can('force-delete-record-card')){
            return true;
        }

        if ($user->can('force-delete-personal-information')){
            return true;
        }

    }
}
