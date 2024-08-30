<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Components/SearchBar', [
            'user' => User::query()
                ->when($request->input('search'), function ($query, $search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
                })
                ->paginate(8)
                ->withQueryString(),
        ]);
    }
}
