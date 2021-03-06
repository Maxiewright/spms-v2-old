<?php

namespace App\Policies\Serviceperson;

use App\Models\User;
use App\Models\Serviceperson\Biodata;
use Illuminate\Auth\Access\HandlesAuthorization;

class BiodataPolicy
{
    use HandlesAuthorization;

    public function before($user)
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
     * @param Biodata $biodata
     * @return mixed
     */
    public function view(User $user, Biodata $biodata)
    {
        if ($user->can('view-record-card')){
            return true;
        }

        if ($user->can('view-personal-information')){
            return true;
        }

        return $user->serviceperson->biodata->id === $biodata->id;
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
     * @param Biodata $biodata
     * @return mixed
     */
    public function update(User $user, Biodata $biodata)
    {


        if ($user->can('update-record-card')){
            return true;
        }

        if ($user->can('update-basic-medical-information')){
            return true;
        }

//       return $user->serviceperson->biodata->id === $biodata->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Biodata $biodata
     * @return mixed
     */
    public function delete(User $user, Biodata $biodata)
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
     * @param Biodata $biodata
     * @return mixed
     */
    public function restore(User $user, Biodata $biodata)
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
     * @param Biodata $biodata
     * @return mixed
     */
    public function forceDelete(User $user, Biodata $biodata)
    {
        if ($user->can('force-delete-record-card')){
            return true;
        }

        if ($user->can('force-delete-personal-information')){
            return true;
        }

    }
}
