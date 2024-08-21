<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

// Home page redirects to the login page.
Route::get('/', [AuthController::class, 'index'])->name('login');

// Post route to handle the login request.
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');

// Route to show the registration form.
Route::get('registration', [AuthController::class, 'registration'])->name('register');

// Post route to handle the registration request.
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');

// Route to the dashboard page after successful login.
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

// Route to handle logout functionality.
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

