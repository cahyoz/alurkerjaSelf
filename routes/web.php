<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AuthMiddleware;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes(['verify' => true]);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('login/google', [RegisterController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [RegisterController::class, 'callback']);

Route::get('complete-registration', [RegisterController::class, 'showCompleteRegistrationForm'])->name('complete.registration');
Route::post('complete-registration', [RegisterController::class, 'completeRegistration']);
Route::get('/get-cities/{province}', [RegisterController::class, 'getCitiesByProvince']);


Route::get('/set-password', [RegisterController::class, 'showSetPasswordForm'])->name('set.password');
Route::post('/set-password', [RegisterController::class, 'setPassword']);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/complete-registration', [RegisterController::class, 'showCompleteRegistrationForm'])->name('complete.registration');
    Route::post('/complete-registration', [RegisterController::class, 'completeRegistration']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [DashboardController::class, 'store'])->name('dashboard');
    Route::get('/projects/{project}', [DashboardController::class, 'show'])->name('projects.show');
    Route::delete('/projects/{project}', [DashboardController::class, 'destroy'])->name('projects.destroy');

    
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


Route::get('/auth/redirect', [RegisterController::class, 'redirect']);
Route::get('/auth/google/callback', [RegisterController::class, 'callback']);