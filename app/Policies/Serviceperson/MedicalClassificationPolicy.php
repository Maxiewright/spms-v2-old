<?php

namespace App\Policies\Serviceperson;

use App\Models\Authentication\User;
use App\Models\Serviceperson\MedicalClassification;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicalClassificationPolicy
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
     * @param MedicalClassification $medicalClassification
     * @return mixed
     */
    public function view(User $user, MedicalClassification $medicalClassification)
    {
        if ($user->can('view-record-card')){
            return true;
        }

        if ($user->can('view-basic-medical-information')){
            return true;
        }

        $user->owns($medicalClassification);
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
     * @param MedicalClassification $medicalClassification
     * @return mixed
     */
    public function update(User $user, MedicalClassification $medicalClassification)
    {
        if ($user->can('update-record-card')){
            return true;
        }

        if ($user->can('update-basic-medical-information')){
            return true;
        }

        $user->owns($medicalClassification);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param MedicalClassification $medicalClassification
     * @return mixed
     */
    public function delete(User $user, MedicalClassification $medicalClassification)
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
     * @param MedicalClassification $medicalClassification
     * @return mixed
     */
    public function restore(User $user, MedicalClassification $medicalClassification)
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
     * @param MedicalClassification $medicalClassification
     * @return mixed
     */
    public function forceDelete(User $user, MedicalClassification $medicalClassification)
    {
        if ($user->can('force-delete-record-card')){
            return true;
        }

        if ($user->can('force-delete-basic-medical-information')){
            return true;
        }
    }
}
