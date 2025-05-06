<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;



Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/login/{provider}',[SocialiteController::class, 'redirectToProvider'])->name('login.redirect');
Route::get('/login/{provider}/callback',[SocialiteController::class, 'handleProviderCallback']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::post('/password', [LogoutController::class, 'password'])->name('password.request');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/projects', ProjectController::class);
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::resource('/tasks', TaskController::class);
    // Profile Edit Route
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
});
