<?php

namespace App\Http\Controllers;

use App\Models\Intention;
use Illuminate\Http\Request;

class AdminIntentionDetails extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(Intention $intention)
    {
        return inertia(
            'Admin/Show',
            [
                'intention' => $intention
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Intention $intention)
    {
        return inertia('Admin/Edit', [
            'intention' => $intention
        ]);
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

        return redirect()->route('admin.intentions')
            ->with('success', 'Intention updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Intention $intention)
    {
        $intention->delete();

        return redirect()->back()->with('success', 'Intention was deleted successfully');
    }
}
