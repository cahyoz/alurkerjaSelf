@extends('layouts.app')

@section('content')
<section class="vh-1 pt-10">
    <div class="container py-5 h-100">
        <ul
            class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
            <li class="me-2" aria-current="page">
                <a href="#"
                    class="inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500">basic</a>
            </li>
            <li class="me-2">
                <a href="/detail"
                    class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">Details</a>
            </li>
            <li class="me-2">
                <a href="/password"
                    class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">Password</a>
            </li>
        </ul>
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-12 col-xl-4">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body">
                        <div class="d-flex justify-content-center mt-3 mb-4 position-relative">
                            <div id="profilePictureWrapper" class="position-relative cursor-pointer">
                                <form id="profilePictureForm" action="{{ route('profile.update.picture') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" id="profilePictureInput" name="profile_picture"
                                        style="display: none;">
                                    @if (Auth::user()->profile_picture)
                                    @if (filter_var(Auth::user()->profile_picture, FILTER_VALIDATE_URL))
                                    <img src="{{ Auth::user()->profile_picture }}" alt="Profile Picture"
                                        class="rounded-full w-96 h-96" width="40" height="40" id="profilePicture">
                                    @else
                                    <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}"
                                        alt="Profile Picture" class="rounded-full w-96 h-96" width="40" height="40"
                                        id="profilePicture">
                                    @endif
                                    @else
                                    <img src="{{ asset('default-profile.png') }}" alt="Default Profile Picture"
                                        class="rounded-full w-96 h-96" width="40" height="40" id="profilePicture">
                                    @endif
                                </form>
                                <div id="profilePictureOverlay"
                                    class="position-absolute top-0 w-96 h-96 rounded-full d-none">
                                    <div
                                        class="d-flex justify-content-center align-items-center h-96 w-96 bg-dark bg-opacity-50 rounded-full text-white">
                                        Change Picture
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-2">{{ $user->username }}</h4>
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="userName" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="userName"
                                    value="{{ old('name', $user->name) }}">
                            </div>
                            <div class="mb-3">
                                <label for="userEmail" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="userEmail"
                                    value="{{ old('email', $user->email) }}">
                            </div>
                            <div class="mb-3">
                                <label for="userWhatsapp" class="form-label">No Wa</label>
                                <input type="text" name="whatsapp_number" class="form-control" id="userWhatsapp"
                                    value="{{ old('whatsapp_number', $user->whatsapp_number) }}">
                            </div>
                            <button type="submit" class="btn btn-warning form-control">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('profilePictureWrapper').addEventListener('click', function() {
    document.getElementById('profilePictureInput').click();
});

document.getElementById('profilePictureInput').addEventListener('change', function() {
    document.getElementById('profilePictureForm').submit();
});

const profilePictureWrapper = document.getElementById('profilePictureWrapper');
const profilePictureOverlay = document.getElementById('profilePictureOverlay');

profilePictureWrapper.addEventListener('mouseover', () => {
    profilePictureOverlay.classList.remove('d-none');
});

profilePictureWrapper.addEventListener('mouseout', () => {
    profilePictureOverlay.classList.add('d-none');
});
</script>
@endsection