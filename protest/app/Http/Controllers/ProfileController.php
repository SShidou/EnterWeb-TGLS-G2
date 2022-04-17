<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{

    public function index(User $user)
    {
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {
        $this -> authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this -> authorize('update', $user->profile);
        $data = request() -> validate ([
            'titles' => 'required',
            'description' => 'required',
            'image' => ''
        ]);


        if (request('image')) {
            $imagePath = request('image')-> store('profile','public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(200,200);
            $image -> save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{Auth()::user->id}");
    }

}
