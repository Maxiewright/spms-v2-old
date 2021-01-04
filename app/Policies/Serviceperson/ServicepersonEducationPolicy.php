<?php

namespace App\Policies\Serviceperson;

use App\Models\User;
use App\Models\Serviceperson\ServicepersonEducation;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicepersonEducationPolicy
{
    use HandlesAuthorization;

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
     * @param ServicepersonEducation $servicepersonEducation
     * @return mixed
     */
    public function view(User $user, ServicepersonEducation $servicepersonEducation)
    {
        if ($user->can('view-record-card')){
            return true;
        }

        if ($user->can('view-qualification')){
            return true;
        }

        return $user->hasModel('educations', $servicepersonEducation);
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

        if ($user->can('create-qualification')){
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param ServicepersonEducation $servicepersonEducation
     * @return mixed
     */
    public function update(User $user, ServicepersonEducation $servicepersonEducation)
    {
        if ($user->can('delete-record-card')){
            return true;
        }

        if ($user->can('update-qualification')){
            return true;
        }

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param ServicepersonEducation $servicepersonEducation
     * @return mixed
     */
    public function delete(User $user, ServicepersonEducation $servicepersonEducation)
    {

        if ($user->can('delete-record-card')){
            return true;
        }

        if ($user->can('delete-qualification')){
            return true;
        }

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param ServicepersonEducation $servicepersonEducation
     * @return mixed
     */
    public function restore(User $user, ServicepersonEducation $servicepersonEducation)
    {
        if ($user->can('delete-record-card')){
            return true;
        }

        if ($user->can('restore-qualification')){
            return true;
        }

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param ServicepersonEducation $servicepersonEducation
     * @return mixed
     */
    public function forceDelete(User $user, ServicepersonEducation $servicepersonEducation)
    {
        if ($user->can('force-delete-record-card')){
            return true;
        }

        if ($user->can('force-delete-qualification')){
            return true;
        }
    }
}
