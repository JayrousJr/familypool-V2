<?php

namespace App\Policies;

use App\Models\AssignedTasks;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AssignedTasksPolicy
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
    public function view(User $user, AssignedTasks $assignedTasks): bool
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
    public function update(User $user, AssignedTasks $assignedTasks): bool
    {
        if ($user->isManager() || $user->isTechnician()) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AssignedTasks $assignedTasks): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AssignedTasks $assignedTasks): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AssignedTasks $assignedTasks): bool
    {
        return false;
    }
}
