<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserProfileImageController extends Controller
{
    public function create(User $user)
    {
        $user->load(['images']);
        return inertia(
            'User/UserImage/Create',
            ['user' => $user]
        );
    }

    public function store(User $user, Request $request)
    {
        if ($request->hasFile('images')) {
            $request->validate([
                'images.*' => 'mimes:png,jpg,jpeg|max:5000'
            ], [
                'images.*.mimes' => 'The file should be in one of the formats listed above'
            ]);
            foreach ($request->file('images') as $file) {
                $path = $file->store('images', 'public');

                $user->images()->save(new UserImage([
                    'filename' => $path
                ]));
            }
        }

        return redirect()->back()->with('success', 'Image uploaded!');
    }

    public function destroy($user, UserImage $image)
    {
        Storage::disk('public')->delete($image->filename);
        $image->delete();

        return redirect()->back()->with('success', 'image was deleted');
    }
}
