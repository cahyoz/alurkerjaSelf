<?php

use App\Http\Controllers\ModelerController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes(['verify' => true]);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('complete-registration', [RegisterController::class, 'showCompleteRegistrationForm'])->name('complete.registration');
Route::post('complete-registration', [RegisterController::class, 'completeRegistration'])->name('complete.registration');
Route::get('/get-cities/{province}', [RegisterController::class, 'getCitiesByProvince']);

Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
    Route::get('/complete-registration', [RegisterController::class, 'showCompleteRegistrationForm'])->name('complete.registration');
    Route::post('/complete-registration', [RegisterController::class, 'completeRegistration']);

    Route::get('/dashboard', [ProjectController::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [ProjectController::class, 'store'])->name('dashboard');


    Route::middleware(['checkProject'])->group(function () {
        
        Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
        Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    });

    Route::middleware(['checkModeler'])->group(function () {
        Route::get('/modeler/{project_id}', [ModelerController::class, 'index'])->name('modeler.show');
        Route::post('/modeler/store', [ModelerController::class, 'store'])->name('modeler.store');    

    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
    Route::post('/profile/update-picture', [ProfileController::class, 'updateProfilePicture'])->name('profile.update.picture');
    Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    
    Route::post('/detail', [ProfileController::class, 'updateProfileDetail'])->name('detail.update');
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');

    Route::get('/detail', [ProfileController::class, 'showProfileDetail'])->name('profile.detail');
    Route::get('/password', [ProfileController::class, 'showProfilePassword'])->name('profile.password');
});