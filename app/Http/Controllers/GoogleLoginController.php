<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $googleUser->email)->first();
        if (!$user) {
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => Hash::make(rand(100000, 999999)),
                'profile_picture' => $googleUser->avatar,  // Save Google profile picture URL
            ]);
        } else {
            // Optionally, update the profile picture if user already exists
            $user->update([
                'profile_picture' => $googleUser->avatar,
            ]);
        }

        Auth::login($user);

        return redirect('/');
    }
}