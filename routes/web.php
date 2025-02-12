<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
    // return redirect('login');
});

Route::get('/register', function () {
    return view('auth.login');
    // return redirect('login');
})->name('auth.register');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
