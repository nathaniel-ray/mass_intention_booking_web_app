<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class AdminSettingsController extends Controller
{
    public function settings()
    {
        $users = User::all(); // Retrieve all users
        return inertia('Admin/Settings', [
            'users' => $users
        ]);
    }

    public function superAdmin()
    {
        return inertia('Admin/SuperAdmin');
    }

    public function updateUser(Request $request, User $user)
    {
        // Validate the request data
        $user->update(
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email,' . $user->id,
            ])
        );

        return redirect()->route('admin.settings')->with('message', 'User info updated');
    }

    public function makeAdmin(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('message', 'User not found.');
        }

        if ($user->is_admin) {
            return redirect()->back()->with('message', 'User is already an admin.');
        }

        $user->is_admin = true;
        $user->save();

        return redirect()->back()->with('message', 'User has been made an admin.');
    }



    public function removeAdmin(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('message', 'User not found.');
        }

        if (!$user->is_admin) {
            return redirect()->back()->with('message', 'User is not an admin.');
        }

        $user->is_admin = false;
        $user->save();

        return redirect()->back()->with('message', 'Admin rights have been removed.');
    }

    // public function makeAdmin(Request $request, User $user)
    // {
    //     // Only allow the currently authenticated admin to make changes
    //     if (Auth::user()->is_admin) {
    //         $user->update(['is_admin' => $request->is_admin]);

    //         return redirect()->back()->with('success', 'Admin status updated successfully.');
    //     }

    //     return redirect()->back()->with('error', 'You are not authorized to perform this action.');
    // }

    public function update(Request $request, $id)
    {

        // Ensure the user is an admin
        if (!Auth::user()->is_admin) {
            return redirect()->back()->with('error', 'You are not authorized to perform this action.');
        }

        // Validate the email
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'is_admin' => 'required|boolean',
        ]);

        // Find user by email instead of ID
        $user = User::where('email', $request->email)->firstOrFail();

        // Update the user's admin status
        $user->update([
            'is_admin' => $request->is_admin,
        ]);

        return redirect()->back()->with('success', 'User role updated successfully.');
    }

    public function removeAdminRole($id)
    {
        // Ensure the user is an admin
        if (!Auth::user()->is_admin) {
            return redirect()->back()->with('error', 'You are not authorized to perform this action.');
        }

        // Find user by ID
        $user = User::findOrFail($id);

        // Remove admin role
        $user->update([
            'is_admin' => false,
        ]);

        return redirect()->back()->with('success', 'Admin role removed successfully.');
    }
}
