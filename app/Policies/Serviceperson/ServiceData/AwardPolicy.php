<?php

namespace App\Policies\Serviceperson\ServiceData;


use App\Models\User;
use App\Models\Serviceperson\Award;
use Illuminate\Auth\Access\HandlesAuthorization;

class AwardPolicy
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
     * @param Award $details
     * @return mixed
     */
    public function viewAny(User $user, Award $details)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Award $details
     * @return mixed
     */
    public function view(User $user, Award $details)
    {
        if ($user->can('view-record-card')){
            return true;
        }

        if ($user->can('view-service-data')){
            return true;
        }

        $user->hasModel('awards', $details);

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

        if ($user->can('create-service-data')){
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Award $details
     * @return mixed
     */
    public function update(User $user, Award $details)
    {
        if ($user->can('update-record-card')){
            return true;
        }

        if ($user->can('update-service-data')){
            return true;
        }

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Award $details
     * @return mixed
     */
    public function delete(User $user, Award $details)
    {
        if ($user->can('delete-record-card')){
            return true;
        }

        if ($user->can('delete-service-data')){
            return true;
        }

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Award $details
     * @return mixed
     */
    public function restore(User $user, Award $details)
    {
        if ($user->can('restore-record-card')){
            return true;
        }

        if ($user->can('restore-service-data')){
            return true;
        }

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Award $details
     * @return mixed
     */
    public function forceDelete(User $user, Award $details)
    {
        if ($user->can('force-delete-record-card')){
            return true;
        }

        if ($user->can('force-delete-service-data')){
            return true;
        }

    }
}
