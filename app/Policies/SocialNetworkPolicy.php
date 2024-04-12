<?php

namespace App\Policies;

use App\Models\SocialNetwork;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SocialNetworkPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
       if ($user->hasPermissionTo('Manager')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SocialNetwork $socialNetwork): bool
    {
       if ($user->hasPermissionTo('Manager')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
       if ($user->hasPermissionTo('Manager')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SocialNetwork $socialNetwork): bool
    {
       if ($user->hasPermissionTo('Manager')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SocialNetwork $socialNetwork): bool
    {
       if ($user->hasPermissionTo('Manager')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SocialNetwork $socialNetwork): bool
    {
       if ($user->hasPermissionTo('Manager')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SocialNetwork $socialNetwork): bool
    {
       if ($user->hasPermissionTo('Manager')) {
            return true;
        }
        return false;
    }
}