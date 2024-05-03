<?php

namespace App\Policies;

use App\Models\Target;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TargetPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Target $target): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Target $target): bool
    {
        if($user->isAdmin()){
            return true;
        }


        // If user is in same division allow & is a divisional user then allow
        if($user->division_id == $target->office->division_id && $user->isDivisionalUser()) {
            return true;
        }

        // If user is in same office allow
        if($user->office_id == $target->office_id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Target $target): bool
    {
        if($user->isAdmin()){
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Target $target): bool
    {
        if($user->isAdmin()){
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Target $target): bool
    {
        if($user->isAdmin()){
            return true;
        }

        return false;
    }
}
