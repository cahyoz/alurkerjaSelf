@extends('layouts.app')

@section('content')
<section class="vh-1 pt-10">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-12 col-xl-4">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body">
                        <div class="d-flex justify-content-center mt-3 mb-4 position-relative">
                            <input type="file" id="profilePictureInput" name="profile_picture" style="display: none;">
                            <div id="profilePictureWrapper" class="position-relative">
                                @if (Auth::user()->profile_picture)
                                @if (filter_var(Auth::user()->profile_picture, FILTER_VALIDATE_URL))
                                <img src="{{ Auth::user()->profile_picture }}" alt="Profile Picture"
                                    class="rounded-full w-96 h-96 cursor-pointer" width="40" height="40"
                                    id="profilePicture">
                                @else
                                <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture"
                                    class="rounded-full w-96 h-96 cursor-pointer" width="40" height="40"
                                    id="profilePicture">
                                @endif
                                @else
                                <img src="{{ asset('default-profile.png') }}" alt="Default Profile Picture"
                                    class="rounded-full w-96 h-96 cursor-pointer" width="40" height="40"
                                    id="profilePicture">
                                @endif
                                <div id="profilePictureOverlay"
                                    class="position-absolute top-0 w-96 h-96 rounded-full d-none">
                                    <div
                                        class="d-flex justify-content-center align-items-center h-100 w-100 bg-dark bg-opacity-50 rounded-full text-white">
                                        Change Picture
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <form id="profilePictureForm" action="{{ route('profile.update.picture') }}" method="POST"
                            enctype="multipart/form-data" class="mt-3">
                            @csrf
                            @method('POST')
                            <input type="file" id="profilePictureInput" name="profile_picture" style="display: none;">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('profilePicture').addEventListener('click', function() {
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