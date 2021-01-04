<?php

namespace App\Policies\Serviceperson;

use App\Models\User;
use App\Models\Serviceperson\NationalIdCard;
use Illuminate\Auth\Access\HandlesAuthorization;

class NationalIdCardPolicy
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
     * @param NationalIdCard $nationalIdCard
     * @return mixed
     */
    public function view(User $user, NationalIdCard $nationalIdCard)
    {
        if ($user->can('view-record-card')){
            return true;
        }

        if ($user->can('view-identification-information')){
            return true;
        }

        return $user->serviceperson->nationalIdCard == $nationalIdCard;
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

        if ($user->can('create-identification-information')){
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param NationalIdCard $nationalIdCard
     * @return mixed
     */
    public function update(User $user, NationalIdCard $nationalIdCard)
    {

        if ($user->can('update-record-card')){
            return true;
        }

        if ($user->can('update-identification-information')){
            return true;
        }

        return $user->serviceperson->nationalIdCard == $nationalIdCard;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param NationalIdCard $nationalIdCard
     * @return mixed
     */
    public function delete(User $user, NationalIdCard $nationalIdCard)
    {
        if ($user->can('delete-record-card')){
            return true;
        }

        if ($user->can('delete-identification-information')){
            return true;
        }

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param NationalIdCard $nationalIdCard
     * @return mixed
     */
    public function restore(User $user, NationalIdCard $nationalIdCard)
    {
        if ($user->can('restore-record-card')){
            return true;
        }

        if ($user->can('restore-identification-information')){
            return true;
        }

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param NationalIdCard $nationalIdCard
     * @return mixed
     */
    public function forceDelete(User $user, NationalIdCard $nationalIdCard)
    {
        if ($user->can('force-delete-record-card')){
            return true;
        }

        if ($user->can('force-delete-identification-information')){
            return true;
        }

    }
}
