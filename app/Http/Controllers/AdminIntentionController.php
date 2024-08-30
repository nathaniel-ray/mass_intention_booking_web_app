<?php

namespace App\Http\Controllers;

use App\Models\Intention;
use App\Models\User;
use Illuminate\Http\Request;

class AdminIntentionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return inertia('Admin/Index', [
            'search' => $request->only([
                'name',
                'intention_for'
            ]),
            'intentions' => Intention::mostRecent()
                ->paginate(2)
        ]);
    }

    public function index2()
    {

        return inertia('Admin/Index2', [
            'intentions' => Intention::mostRecent()
                ->paginate(10)
                ->withQueryString()
            // ->withCount('intentions')
        ]);
    }

    public function intentionDets()
    {

        return inertia('Admin/IntentionDets', [
            'intentions' => Intention::mostRecent()
                ->paginate(10)
                ->withQueryString()
        ]);
    }
}
