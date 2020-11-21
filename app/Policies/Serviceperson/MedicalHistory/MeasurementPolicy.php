<?php

namespace App\Policies\Serviceperson\MedicalHistory;

use App\Models\Authentication\User;
use App\Models\Serviceperson\Measurement;
use Illuminate\Auth\Access\HandlesAuthorization;

class MeasurementPolicy
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
     * @param Measurement $details
     * @return mixed
     */
    public function view(User $user, Measurement $details)
    {
        if ($user->can('view-record-card')){
            return true;
        }

        if ($user->can('view-personal-information')){
            return true;
        }
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

        if ($user->can('create-basic-medical-information')){
            return true;
        }

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Measurement $details
     * @return mixed
     */
    public function update(User $user, Measurement $details)
    {
        if ($user->can('update-record-card')){
            return true;
        }

        if ($user->can('create-basic-medical-information')){
            return true;
        }

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Measurement $details
     * @return mixed
     */
    public function delete(User $user, Measurement $details)
    {
        if ($user->can('delete-record-card')){
            return true;
        }

        if ($user->can('create-basic-medical-information')){
            return true;
        }

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Measurement $details
     * @return mixed
     */
    public function restore(User $user, Measurement $details)
    {
        if ($user->can('restore-record-card')){
            return true;
        }

        if ($user->can('create-basic-medical-information')){
            return true;
        }

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Measurement $details
     * @return mixed
     */
    public function forceDelete(User $user, Measurement $details)
    {
        if ($user->can('force-delete-record-card')){
            return true;
        }

        if ($user->can('create-basic-medical-information')){
            return true;
        }

    }
}
