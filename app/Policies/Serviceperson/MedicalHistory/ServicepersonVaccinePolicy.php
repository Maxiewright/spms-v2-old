<?php

namespace App\Policies\Serviceperson\MedicalHistory;


use App\Models\Authentication\User;
use App\Models\Serviceperson\ServicepersonVaccine;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicepersonVaccinePolicy
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
     * @param ServicepersonVaccine $details
     * @return mixed
     */
    public function viewAny(User $user, ServicepersonVaccine $details)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param ServicepersonVaccine $details
     * @return mixed
     */
    public function view(User $user, ServicepersonVaccine $details)
    {
        if ($user->can('view-record-card')){
            return true;
        }

        if ($user->can('view-basic-medical-information')){
            return true;
        }

        return $user->serviceperson->number === $details->serviceperson_number;

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
     * @param ServicepersonVaccine $details
     * @return mixed
     */
    public function update(User $user, ServicepersonVaccine $details)
    {

        if ($user->can('update-record-card')){
            return true;
        }

        if ($user->can('update-basic-medical-information')){
            return true;
        }

       return $user->serviceperson->number === $details->serviceperson_number;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param ServicepersonVaccine $details
     * @return mixed
     */
    public function delete(User $user, ServicepersonVaccine $details)
    {
        if ($user->can('delete-record-card')){
            return true;
        }

        if ($user->can('delete-basic-medical-information')){
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param ServicepersonVaccine $details
     * @return mixed
     */
    public function restore(User $user, ServicepersonVaccine $details)
    {
        if ($user->can('restore-record-card')){
            return true;
        }

        if ($user->can('restore-basic-medical-information')){
            return true;
        }

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param ServicepersonVaccine $details
     * @return mixed
     */
    public function forceDelete(User $user, ServicepersonVaccine $details)
    {
        if ($user->can('force-delete-record-card')){
            return true;
        }

        if ($user->can('force-delete-basic-medical-information')){
            return true;
        }
    }
}
