<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Car;


class UserProfileController extends Controller
{
    public function profile()
    {
     
/** @var User $user */
$user = Auth::user();
          $cars = Car::latest()->get();
    return view('frontend.home', compact('cars'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.edit-profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
        ]);

        /** @var User $user */
        $user = Auth::user();

        $user->update($request->only('name', 'email'));

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully.');
    }
}
