<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    function showLoginForm()
    {
        return view('auth.login');
    }

    function registerForm()
    {
        return view('auth.register');
    }

    function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Regenerate the session to prevent session fixation attacks
            $request->session()->regenerate();

            // Save user credentials in the session
            $request->session()->put('username', $request->input('username'));
            $request->session()->put('role', Auth::user()->role);

            // Redirect based on user role
            if (Auth::user()->role === 2) {
                return redirect()->intended('/home/');
            }
            if (Auth::user()->role === 1) {
                return redirect()->intended('/home/');
            }
            if (Auth::user()->role === 3) {
                Auth::logout();
                return back()->withErrors([
                    'username' => 'Your account has been blocked.',
                ])->onlyInput('username');
            }
        }

        // If authentication fails, return back with an error message
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);

    }

}

