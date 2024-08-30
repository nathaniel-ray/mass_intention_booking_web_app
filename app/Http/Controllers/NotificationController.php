<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;
use Illuminate\Support\Facades\Gate;

class NotificationController extends Controller
{
    public function index(Request $request): Response
    {
        $user = $request->user();

        $notificationsQuery = $user->is_admin
            ? \Illuminate\Notifications\DatabaseNotification::query()
            : $user->notifications();

        $notifications = $notificationsQuery->paginate(10);

        // Optionally, you can check with the policy (not always needed for this specific case):
        foreach ($notifications as $notification) {
            if (!Gate::allows('view', $notification)) {
                abort(403);
            }
        }

        return inertia('Notification/Index', [
            'notifications' => $notifications,
        ]);
    }
}
