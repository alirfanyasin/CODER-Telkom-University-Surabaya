<?php

use App\Livewire\Auth\Login;
use App\Livewire\Pages\Home;
use Illuminate\Support\Facades\Route;


// Guest Route
Route::get('/', Home::class)->name('home');


// Auth Route
Route::get('/login', Login::class)->name('login');


// App Route
