<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('email', $request->input('email'));
            $request->session()->put('role', Auth::user()->role);

            switch (Auth::user()->role) {
                case 'admin':
                    return redirect()->intended('/');
                case 'client':
                    return redirect()->intended('/');
                case 'blocked':
                    Auth::logout();
                    return back()->withErrors([
                        'email' => 'Your account has been blocked.',
                    ])->withInput($request->only('email'));
                default:
                    return redirect()->intended('/home');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }
    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('welcome');
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
