<?php

namespace App\Policies;

use App\Models\Chick;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChickPolicy
{
    use HandlesAuthorization;


    public function before (User $user) {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chick  $chick
     * @return mixed
     */
    public function view(User $user, Chick $chick)
    {
       return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chick  $chick
     * @return mixed
     */
    public function update(User $user, Chick $chick)
    {
        return $user->id === $chick->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chick  $chick
     * @return mixed
     */
    public function delete(User $user, Chick $chick)
    {
        return $user->id === $chick->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chick  $chick
     * @return mixed
     */
    public function restore(User $user, Chick $chick)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chick  $chick
     * @return mixed
     */
    public function forceDelete(User $user, Chick $chick)
    {
        //
    }
}
