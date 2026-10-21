<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Public company profile
Route::get('/', [HomeController::class, 'index'])->name('home');

// Redirect any legacy login or admin attempts back to home
Route::get('/login', fn () => redirect()->route('home'))->name('login');
Route::any('/admin/{any?}', fn () => redirect()->route('home'))->where('any', '.*');
