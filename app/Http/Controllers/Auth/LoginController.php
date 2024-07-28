<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use App\Http\Controllers\Controller as BaseController;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Cari pengguna berdasarkan email
        $user = User::where('email', $credentials['email'])->first();

        // Jika pengguna ditemukan dan memiliki Google ID, periksa kata sandi default
        if ($user && $user->google_id && Hash::check('123', $user->password)) {
            return redirect()->route('set.password')->withErrors([
                'email' => 'Please set a new password to login.',
            ]);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('email', $request->input('email'));
            $request->session()->put('role', Auth::user()->role);

            switch (Auth::user()->role) {
                case 'admin':
                    return redirect()->intended('/');
                case 'client':
                    return redirect()->intended('/');
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
