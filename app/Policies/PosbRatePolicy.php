<?php

namespace App\Policies;

use App\Models\PosbRate;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PosbRatePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Only if user is admin
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PosbRate $posbRate): bool
    {
        // Only if user is admin
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Only if user is admin
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PosbRate $posbRate): bool
    {
        // Only if user is admin
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PosbRate $posbRate): bool
    {
        // Only if user is admin
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PosbRate $posbRate): bool
    {
        // Only if user is admin
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PosbRate $posbRate): bool
    {
        // Only if user is admin
        return $user->isAdmin();
    }
}
