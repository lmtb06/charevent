<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Evenement;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class EvenementPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return True;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Evenement  $evenement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Evenement $evenement)
    {
        return True;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return True;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Evenement  $evenement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Evenement $evenement)
    {
        return $user->id_compte === $evenement->id_createur 
            || $user->role === config('enums.user_roles.su')
            ? Response::allow()
                : Response::deny("Vous n'êtes pas le créateur de cet événement.");
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Evenement  $evenement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Evenement $evenement)
    {
        return $user->id_compte === $evenement->id_createur
            || $user->role === config('enums.user_roles.su')
            ? Response::allow()
            : Response::deny("Vous n'êtes pas le créateur de cet événement.");

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Evenement  $evenement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Evenement $evenement)
    {
        return $user->id_compte === $evenement->id_createur
            || $user->role === config('enums.user_roles.su')
            ? Response::allow()
            : Response::deny("Vous n'êtes pas le créateur de cet événement.");

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Evenement  $evenement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Evenement $evenement)
    {
        return $user->id_compte === $evenement->id_createur
            || $user->role === config('enums.user_roles.su')
            ? Response::allow()
            : Response::deny("Vous n'êtes pas le créateur de cet événement.");

    }
}
