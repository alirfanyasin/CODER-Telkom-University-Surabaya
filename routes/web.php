<?php

use App\Livewire\App\Dashboard;
use App\Livewire\App\Meeting;
use App\Livewire\App\MeetingCreate;
use App\Livewire\App\MeetingDetail;
use App\Livewire\App\MeetingEdit;
use App\Livewire\App\Modul;
use App\Livewire\App\ModulCreate;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Pages\Home;
use Illuminate\Support\Facades\Route;


// Guest Route
Route::get('/', Home::class)->name('home');


// Auth Route
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

// Authenticated - User
Route::prefix('app')->group(function () {
  Route::get('/', Dashboard::class)->name('app.dashboard');

  // Modul


  // Tugas


  // Meeting
  Route::get('/e-learning/meeting', Meeting::class)->name('app.e-learning.meeting');
  Route::get('/e-learning/meeting/create', MeetingCreate::class)->name('app.e-learning.meeting.create');
  Route::get('/e-learning/meeting/pertemuan-1/show', MeetingDetail::class)->name('app.e-learning.meeting.show');
  Route::get('/e-learning/meeting/pertemuan-1/edit', MeetingEdit::class)->name('app.e-learning.meeting.edit');

  // Modul
  Route::get('/e-learning/modul', Modul::class)->name('app.e-learning.modul');
  Route::get('/e-learning/modul/create', ModulCreate::class)->name('app.e-learning.modul.create');
});
