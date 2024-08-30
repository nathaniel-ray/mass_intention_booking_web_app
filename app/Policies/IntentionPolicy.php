<?php

namespace App\Policies;

use App\Models\Intention;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IntentionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Allow all users to view any intentions
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Intention $intention): bool
    {
        // Allow all users to view a specific intention
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Allow all users to create intentions
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Intention $intention): bool
    {
        // Only allow users to update their own intentions
        return $user->id === $intention->by_user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Intention $intention): bool
    {
        // Only allow users to delete their own intentions
        return $user->id === $intention->by_user_id;
    }

    /**
     * Determine whether the user can access admin views.
     */
    public function viewAdmin(User $user): bool
    {
        // Only allow users with is_admin set to 1 to access admin views
        return $user->is_admin;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Intention $intention): bool
    {
        // Implement restore logic here if needed
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Intention $intention): bool
    {
        // Implement force delete logic here if needed
        return false;
    }
}
