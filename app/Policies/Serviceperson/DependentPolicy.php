<?php

namespace App\Policies\Serviceperson;

use App\Models\User;
use App\Models\Serviceperson\Dependent;
use Illuminate\Auth\Access\HandlesAuthorization;

class DependentPolicy
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
     * @param Dependent $dependent
     * @return mixed
     */
    public function view(User $user, Dependent $dependent)
    {
        if ($user->can('view-record-card')){
            return true;
        }

        if ($user->can('view-dependents')){
            return true;
        }

        return $user->serviceperson->dependents == $dependent;
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

        if ($user->can('create-dependents')){
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Dependent $dependent
     * @return mixed
     */
    public function update(User $user, Dependent $dependent)
    {
        if ($user->can('update-record-card')){
            return true;
        }

        if ($user->can('update-dependents')){
            return true;
        }

        return $user->hasModel('dependents', $dependent);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Dependent $dependent
     * @return mixed
     */
    public function delete(User $user, Dependent $dependent)
    {
        if ($user->can('delete-record-card')){
            return true;
        }

        if ($user->can('delete-dependents')){
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Dependent $dependent
     * @return mixed
     */
    public function restore(User $user, Dependent $dependent)
    {
        if ($user->can('restore-record-card')){
            return true;
        }

        if ($user->can('restore-dependents')){
            return true;
        }

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Dependent $dependent
     * @return mixed
     */
    public function forceDelete(User $user, Dependent $dependent)
    {
        if ($user->can('force-delete-record-card')){
            return true;
        }

        if ($user->can('force-delete-dependents')){
            return true;
        }

    }
}
