<?php

namespace App\Http\Controllers;

use App\Models\Intention;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserIntentionController extends Controller
{
    public function index(User $user, Request $request)
    {
        $filters = [
            'deleted' => $request->boolean('deleted'),
            ...$request->only(['by', 'order'])
        ];

        $user->load(['images']);
        return inertia(
            'User/Index',
            [
                'filters' => $filters,
                'intentions' => Auth::user()
                    ->intentions()
                    ->mostRecent()
                    ->filter($filters)
                    ->paginate(5)
                    ->withQueryString()
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Intention $intention)
    {
        return inertia(
            'User/Edit',
            [
                'intention' => $intention
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Intention $intention)
    {
        $intention->update(
            $request->validate(
                [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:30',
                    'phone' => 'required|numeric',
                    'intention_for' => 'required|string|max:30',
                    'intention' => 'required|string|max:255',
                    'start_date' => 'required|date',
                    'end_date' => 'required|date',
                    'sunday_mass' => 'required|string|max:255',
                    'weekday_mass' => 'required|string|max:255',
                ]
            )
        );

        return redirect()->route('user.account.index')
            ->with('success', 'Intention updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Intention $intention)
    {
        $intention->delete();
        return redirect()->back()
            ->with('success', 'Intention was deleted');
    }
}
