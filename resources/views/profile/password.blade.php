@extends('layouts.app')

@section('content')
<section class="vh-1 pt-10">
    <div class="container py-5 h-100">
        <ul
            class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
            <li class="me-2">
                <a href="/profile"
                    class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-blue-600 dark:hover:text-gray-300">basic</a>
            </li>
            <li class="me-2">
                <a href="/detail"
                    class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-blue-600 dark:hover:text-gray-300">Details</a>
            </li>
            <li class="me-2" aria-current="page">
                <a href="#"
                    class="inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500">Password</a>
            </li>
        </ul>
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-12 col-xl-4">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body">
                        <h4 class="mb-2">{{ $user->username }}</h4>
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="old_password" class="form-label">{{ __('Current Password') }}</label>
                                <input type="password" id="old_password" name="old_password" class="form-control"
                                    required>
                                @error('old_password')
                                <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="new_password" class="form-label">{{ __('New Password') }}</label>
                                <input type="password" id="new_password" name="new_password" class="form-control"
                                    required>
                                @error('new_password')
                                <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="new_password_confirmation"
                                    class="form-label">{{ __('Confirm New Password') }}</label>
                                <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                    class="form-control" required>
                                @error('new_password_confirmation')
                                <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-warning form-control">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection