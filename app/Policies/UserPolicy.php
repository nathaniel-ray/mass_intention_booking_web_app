<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    use HandlesAuthorization;

    public function admin(User $user)
    {
        return $user->is_admin; // Assuming you have an `is_admin` boolean field in your `users` table
    }
}
