<?php

namespace App\Policies;

use App\Models\CountOfAccountOpening;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CountOfAccountOpeningPolicy
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
    public function view(User $user, CountOfAccountOpening $countOfAccountOpening): bool
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
    public function update(User $user, CountOfAccountOpening $countOfAccountOpening): bool
    {
        // If user is admin allow
        if($user->isAdmin()) {
            return true;
        }

        // If user is in same division allow & is a divisional user then allow
        if($user->division_id == $countOfAccountOpening->office->division_id && $user->isDivisionalUser()) {
            return true;
        }

        // If user is in same office allow
        if($user->office_id == $countOfAccountOpening->office_id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CountOfAccountOpening $countOfAccountOpening): bool
    {
        // If user is admin allow
        if($user->isAdmin()) {
            return true;
        }

        // If user is in same division allow & is a divisional user then allow
        if($user->division_id == $countOfAccountOpening->office->division_id && $user->isDivisionalUser()) {
            return true;
        }

        // If user is in same office allow
        if($user->office_id == $countOfAccountOpening->office_id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CountOfAccountOpening $countOfAccountOpening): bool
    {
        // If user is admin allow
        if($user->isAdmin()) {
            return true;
        }

        // If user is in same division allow & is a divisional user then allow
        if($user->division_id == $countOfAccountOpening->office->division_id && $user->isDivisionalUser()) {
            return true;
        }

        // If user is in same office allow
        if($user->office_id == $countOfAccountOpening->office_id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CountOfAccountOpening $countOfAccountOpening): bool
    {
        // If user is admin allow
        if($user->isAdmin()) {
            return true;
        }

        // If user is in same division allow & is a divisional user then allow
        if($user->division_id == $countOfAccountOpening->office->division_id && $user->isDivisionalUser()) {
            return true;
        }

        // If user is in same office allow
        if($user->office_id == $countOfAccountOpening->office_id) {
            return true;
        }

        return false;
    }
}
