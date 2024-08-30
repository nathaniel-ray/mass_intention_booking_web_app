<?php

namespace App\Http\Controllers;

use App\Models\Intention;
use App\Notifications\IntentionMade;
use Illuminate\Http\Request;
use Inertia\Inertia;

class IntentionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return inertia(
            'Intention/Index',
            [

                'intentions' => Intention::mostRecent()
                    ->paginate(10)
                    ->withQueryString()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Intention/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Replace Intention::create with

        $intention = $request->user()->intentions()->create(
            $request->validate(
                [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:30',
                    'phone' => 'required|numeric',
                    'intention_for' => 'required|string|max:30',
                    'intention' => 'required|string|max:255',
                    'start_date' => 'required|date',
                    'end_date' => 'required|date',
                    'sunday_mass' => 'required|string|max:30',
                    'weekday_mass' => 'required|string|max:10',
                ]
            )
        );
        $intention->owner->notify(
            new IntentionMade($intention)
        );

        return redirect()->route('intention.home')
            ->with('success', 'Intention created successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Intention $intention)
    {
        return inertia(
            'Intention/Show',
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
                    'sunday_mass' => 'required|string|max:30',
                    'weekday_mass' => 'required|string|max:10',
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
            ->with('success', 'intention was deleted');
    }
}
