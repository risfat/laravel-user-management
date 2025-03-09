<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\UserController;

// Redirect authenticated users to dashboard when they visit the root URL
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // User management routes
    Route::resource('users', UserController::class);
});
