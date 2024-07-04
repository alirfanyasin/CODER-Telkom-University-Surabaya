<?php

use App\Livewire\App\Dashboard;
use App\Livewire\Auth\Login;
use App\Livewire\Pages\Home;
use Illuminate\Support\Facades\Route;


// Guest Route
Route::get('/', Home::class)->name('home');


// Auth Route
Route::get('/login', Login::class)->name('login');
Route::get('/register', Login::class)->name('login');


// Authenticated - User
Route::prefix('app')->group(function () {
  Route::get('/', Dashboard::class)->name('dashboard');
})->name('app.');
