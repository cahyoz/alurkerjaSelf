<!-- resources/views/profile/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profile</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">{{ $user->email }}</p>
            <img src="{{ $user->profile_picture }}" alt="Profile Picture" class="img-thumbnail">
        </div>
    </div>
</div>
@endsection
