<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Notifications\DatabaseNotification;

class NotificationPolicy
{
    /**
     * Determine if the given notification can be viewed by the user.
     */
    public function view(User $user, DatabaseNotification $notification)
    {
        // Allow admins to view all notifications
        if ($user->is_admin) {
            return true;
        }

        // Allow users to view their own notifications
        return $user->id === $notification->notifiable_id;
    }
}
