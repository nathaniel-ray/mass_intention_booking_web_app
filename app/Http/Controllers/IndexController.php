<?php

namespace App\Http\Controllers;

use App\Models\Intention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        // dd(Auth::user());

        return inertia(
            "Index/Index",
            [
                'message' => 'Hello from your Creator!'
            ]
        );
    }
    public function show()
    {
        return inertia("Index/Show");
    }
}
