@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div class="w-full max-w-md bg-gray-900 dark:bg-gray-800 shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100 text-center">{{ __('Login') }}</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email"
                        class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">{{ __('Email') }}</label>
                    <input id="email" type="email"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 @error('email') border-red-500 @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password"
                        class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">{{ __('Password') }}</label>
                    <input id="password" type="password"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 @error('password') border-red-500 @enderror"
                        name="password" required autocomplete="current-password">
                    @error('password')
                        <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input id="remember" type="checkbox"
                            class="form-checkbox text-blue-600 dark:bg-gray-800 dark:border-gray-600" name="remember">
                        <label class="ml-2 text-gray-700 dark:text-gray-300 text-sm font-medium"
                            for="remember">{{ __('Remember Me') }}</label>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="text-blue-600 dark:text-blue-400 text-sm font-medium hover:underline"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
                    {{ __('Login') }}
                </button>

                <div class="mt-4">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="bg-gray-700 dark:bg-gray-800 px-2 text-gray-500 dark:text-white">Or continue with</span>
                        </div>
                    </div>
                    <a href="auth/redirect"
                        class="block w-full text-center py-2 my-3 border flex items-center justify-center border-slate-200 rounded-lg text-slate-700 hover:border-slate-400 hover:text-slate-900 hover:shadow transition duration-150">
                        <img src="https://www.svgrepo.com/show/355037/google.svg" class="w-5 h-5 mr-2" alt="Google Icon">
                        <span class="dark:text-gray-300">Sign in with Google</span>
                    </a>
                </div>
                {{-- <div>
                    <a href="auth/redirect" class="text-white">Sign in with Google</a>
                </div> --}}
            </form>

            <div class="mt-6 text-center">
                <p class="text-gray-700 dark:text-gray-300 text-sm">{{ __("Don't have an account?") }} <a
                        href="{{ route('register') }}"
                        class="text-blue-600 dark:text-blue-400 font-medium hover:underline">{{ __('Register here') }}</a>
                </p>
            </div>
        </div>
    </div>
@endsection
