<?php

use App\Http\Controllers\Auth\Logout;
use App\Livewire\App\Dashboard;
use App\Livewire\App\Event\ManagementEvent;
use App\Livewire\App\Event\ManagementEventDetail;
use App\Livewire\App\Event\Reqrutment;
use App\Livewire\App\Gallery as AppGallery;
use App\Livewire\App\Task;
use App\Livewire\App\TaskCreate;
use App\Livewire\App\TaskDetail;
use App\Livewire\App\TaskEdit;
use App\Livewire\App\TaskSubmission;
use App\Livewire\App\Meeting;
use App\Livewire\App\MeetingCreate;
use App\Livewire\App\MeetingDetail;
use App\Livewire\App\MeetingEdit;
use App\Livewire\App\Presence;
use App\Livewire\App\PresenceCreate;
use App\Livewire\App\PresenceDetail;
use App\Livewire\App\PresenceEdit;
use App\Livewire\App\Member;
use App\Livewire\App\MemberDetail;
use App\Livewire\App\MemberRecruitment;
use App\Livewire\App\Modul;
use App\Livewire\App\ModulCreate;
use App\Livewire\App\ModulEdit;
use App\Livewire\App\Profile;
use App\Livewire\App\ProfileEdit;
use App\Livewire\App\Quiz\Quiz;
use App\Livewire\App\Quiz\QuizAnswerKey;
use App\Livewire\App\Quiz\QuizCreate;
use App\Livewire\App\Quiz\QuizEdit;
use App\Livewire\App\Quiz\QuizLive;
use App\Livewire\App\Quiz\QuizQuestionCreate;
use App\Livewire\App\Quiz\QuizShow;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Pages\Home;

use App\Livewire\Pages\Gallery;

use App\Livewire\Pages\Article;

use Illuminate\Support\Facades\Route;


// Guest Route
Route::get('/', Home::class)->name('home');
Route::get('/gallery', Gallery::class)->name('gallery');

// article
Route::get('/article', Article::class)->name('article');
Route::get('/article/{slug}', Article::class)->name('article.detail');

Route::middleware(['guest'])->group(function () {
    // Auth Route
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');
});

Route::middleware(['auth'])->group(function () {
    // Authenticated - User
    Route::prefix('app')->group(function () {

        Route::get('/', Dashboard::class)->name('app.dashboard');

        // Tugas
        Route::get('/e-learning/task', Task::class)->name('app.e-learning.task');
        Route::get('/e-learning/task/{slug}/detail', TaskDetail::class)->name('app.e-learning.task.detail');
        Route::middleware(['role:admin'])->group(function () {
            Route::get('/e-learning/task/create', TaskCreate::class)->name('app.e-learning.task.create');
            Route::get('/e-learning/task/{slug}/edit', TaskEdit::class)->name('app.e-learning.task.edit');
            Route::get('/e-learning/task/tugas-1/submission', TaskSubmission::class)->name('app.e-learning.task.submission');
        });

        // Meeting
        Route::get('/e-learning/meeting', Meeting::class)->name('app.e-learning.meeting');
        Route::get('/e-learning/meeting/pertemuan-1/show', MeetingDetail::class)->name('app.e-learning.meeting.show');
        Route::middleware(['role:admin'])->group(function () {
            Route::get('/e-learning/meeting/create', MeetingCreate::class)->name('app.e-learning.meeting.create');
            Route::get('/e-learning/meeting/pertemuan-1/edit', MeetingEdit::class)->name('app.e-learning.meeting.edit');
        });

        // Modul
        Route::get('/e-learning/modul', Modul::class)->name('app.e-learning.modul');
        Route::middleware(['role:admin'])->group(function () {
            Route::get('/e-learning/modul/create', ModulCreate::class)->name('app.e-learning.modul.create');
            Route::get('/e-learning/modul/{id}/edit', ModulEdit::class)->name('app.e-learning.modul.edit');
            // Route::get('/e-learning/modul/{id}/destroy', ModulEdit::class)->name('app.e-learning.modul.destroy');
        });

        // Kuis
        Route::middleware(['role:admin|user'])->group(function () {
            Route::get('/e-learning/quiz', Quiz::class)->name('app.e-learning.quiz');
            Route::middleware(['role:admin'])->group(function () {
                Route::get('/e-learning/quiz/{code}/{id}/show', QuizShow::class)->name('app.e-learning.quiz.show');
                Route::get('/e-learning/quiz/create', QuizCreate::class)->name('app.e-learning.quiz.create');
                Route::get('/e-learning/quiz/question/create', QuizQuestionCreate::class)->name('app.e-learning.quiz.question-create');
                Route::get('/e-learning/quiz/answer-key/create', QuizAnswerKey::class)->name('app.e-learning.quiz.answere-key-create');
                Route::get('/e-learning/quiz/{slug}/edit', QuizEdit::class)->name('app.e-learning.quiz.edit');
            });
            Route::middleware(['role:user'])->group(function () {
                Route::get('/e-learning/quiz/{slug}/{code}/live', QuizLive::class)->name('app.e-learning.quiz-live');
            });
        });

        // App Gallery
        Route::get('/content/gallery', AppGallery::class)->name('app.content.gallery');

        // Event
        Route::get('/event/management-event', ManagementEvent::class)->name('app.event.management-event');
        Route::get('/event/management-event/show', ManagementEventDetail::class)->name('app.event.management-event.show');
        Route::get('/event/reqrutment', Reqrutment::class)->name('app.event.reqrutment');

        // Presence
        Route::get('/presence', Presence::class)->name('app.presence');
        Route::get('/presence/presensi-1/show', PresenceDetail::class)->name('app.presence.show');
        Route::middleware(['role:admin'])->group(function () {
            Route::get('/presence/create', PresenceCreate::class)->name('app.presence.create');
            Route::get('/presence/presensi-1/edit', PresenceEdit::class)->name('app.presence.edit');
        });

        // Member
        Route::get('member', Member::class)->name('app.member');
        Route::get('member/detail', MemberDetail::class)->name('app.member.detail');
        Route::middleware(['role:admin|super-admin'])->group(function () {
            Route::get('member/recruitment', MemberRecruitment::class)->name('app.member.recruitment');
        });

        // Profile
        Route::get('profile', Profile::class)->name('app.profile');
        Route::get('profile/edit', ProfileEdit::class)->name('app.profile.edit');

        // Logout Route
        Route::get('/logout', [Logout::class, 'logout'])->name('logout');
    });

    // Tugas
    Route::get('/e-learning/task', Task::class)->name('app.e-learning.task');
    Route::get('/e-learning/task/tugas-1/detail', TaskDetail::class)->name('app.e-learning.task.detail');
    Route::middleware(['role:admin'])->group(function () {
      Route::get('/e-learning/task/create', TaskCreate::class)->name('app.e-learning.task.create');
      Route::get('/e-learning/task/tugas-1/edit', TaskEdit::class)->name('app.e-learning.task.edit');
      Route::get('/e-learning/task/tugas-1/submission', TaskSubmission::class)->name('app.e-learning.task.submission');
    });
});
