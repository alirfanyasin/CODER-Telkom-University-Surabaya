<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\Logout;
use App\Livewire\App\Dashboard;
use App\Livewire\App\Division;
use App\Livewire\App\DivisionCreate;
use App\Livewire\App\DivisionEdit;
use App\Livewire\App\DivisionDetail;
use App\Livewire\App\Event\ManagementEvent;
use App\Livewire\App\Event\ManagementEventDetail;
use App\Livewire\App\Event\Reqrutment;
use App\Livewire\App\Gallery as AppGallery;
use App\Livewire\App\GalleryCreate as AppGalleryCreate;
use App\Livewire\App\GalleryEdit as AppGalleryEdit;
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
use App\Livewire\App\Article as AppArticle;
use App\Livewire\App\ArticleCreate;
use App\Livewire\App\ArticleEdit;
use App\Livewire\App\PresenceShare;
use App\Livewire\App\Points\LetterOfActive;
use App\Livewire\App\Points\Points;
use App\Livewire\App\Profile;
use App\Livewire\App\ProfileEdit;
use App\Livewire\App\Quiz\Quiz;
use App\Livewire\App\Quiz\QuizAnswerKey;
use App\Livewire\App\Quiz\QuizConfirmation;
use App\Livewire\App\Quiz\QuizCreate;
use App\Livewire\App\Quiz\QuizEdit;
use App\Livewire\App\Quiz\QuizLive;
use App\Livewire\App\Quiz\QuizQuestionCreate;
use App\Livewire\App\Quiz\QuizResult;
use App\Livewire\App\Quiz\QuizShow;
use App\Livewire\App\Quiz\QuizSubmission;
use App\Livewire\App\Report;
use App\Livewire\App\ReportCreate;
use App\Livewire\App\ReportEdit;
use App\Livewire\App\TaskSubmissionEdit;
use App\Livewire\App\TaskSubmissionShowAnswer;
use App\Livewire\Auth\ChangePassword;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
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

Route::get("/presence/verify/{slug}/{presence}/user-presence", PresenceShare::class)->name("app.presence.share");

// Auth Route
Route::middleware(['guest'])->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');
    Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');

    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');
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
        });
        Route::middleware(['role:admin|super-admin'])->group(function () {
            Route::get('/e-learning/task/{slug}/show-answer', TaskSubmissionShowAnswer::class)->name('app.e-learning.task.show-answer');
        });
        Route::middleware(['role:user'])->group(function () {
            Route::get('/e-learning/task/{slug}/submission', TaskSubmission::class)->name('app.e-learning.task.submission');
            Route::get('/e-learning/task/{slug}/submission/edit', TaskSubmissionEdit::class)->name('app.e-learning.task.submission.edit');
            Route::get('/e-learning/task/{slug}/show-score', TaskSubmission::class)->name('app.e-learning.task.show-score');
        });

        // Meeting
        Route::get('/e-learning/meeting', Meeting::class)->name('app.e-learning.meeting');
        Route::get('/e-learning/meeting/{id}/show', MeetingDetail::class)->name('app.e-learning.meeting.show');
        Route::middleware(['role:admin'])->group(function () {
            Route::get('/e-learning/meeting/create', MeetingCreate::class)->name('app.e-learning.meeting.create');
            Route::get('/e-learning/meeting/{id}/edit', MeetingEdit::class)->name('app.e-learning.meeting.edit');
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
                Route::get('/e-learning/quiz/{code}/{id}/submission', QuizSubmission::class)->name('app.e-learning.quiz.submission');
                Route::get('/e-learning/quiz/create', QuizCreate::class)->name('app.e-learning.quiz.create');
                Route::get('/e-learning/quiz/question/create', QuizQuestionCreate::class)->name('app.e-learning.quiz.question-create');
                Route::get('/e-learning/quiz/answer-key/create', QuizAnswerKey::class)->name('app.e-learning.quiz.answere-key-create');
                Route::get('/e-learning/quiz/{code}/{id}/edit', QuizEdit::class)->name('app.e-learning.quiz.edit');
            });
            Route::middleware(['role:user'])->group(function () {
                Route::get('/e-learning/quiz/{code}/{slug}/confirmation', QuizConfirmation::class)->name('app.e-learning.quiz-confirmation');
                Route::get('/e-learning/quiz/{slug}/{id}/live', QuizLive::class)->name('app.e-learning.quiz-live');
                Route::get('/e-learning/quiz/{id}/result', QuizResult::class)->name('app.e-learning.quiz-result');
            });
        });

        // App Gallery
        Route::middleware(['role:super-admin'])->group(function () {
            Route::get('/content/gallery', AppGallery::class)->name('app.content.gallery');
            Route::get("/content/gallery/{id}/edit", AppGalleryEdit::class)->name('app.content.gallery.edit');
            Route::get("/content/gallery/create", AppGalleryCreate::class)->name('app.content.gallery.create');
        });

        // App Article
        Route::get('/content/article', AppArticle::class)->name('app.content.article');
        Route::get('/content/article/create', ArticleCreate::class)->name('app.content.article.create');
        Route::get('/content/article/edit', ArticleEdit::class)->name('app.content.article.edit');
        Route::get('/content/article/{slug}', AppArticle::class)->name('app.content.article.detail');

        // Event
        Route::get('/event/management-event', ManagementEvent::class)->name('app.event.management-event');
        Route::get('/event/management-event/show', ManagementEventDetail::class)->name('app.event.management-event.show');
        Route::get('/event/reqrutment', Reqrutment::class)->name('app.event.reqrutment');

        // Presence
        Route::get('/presence', Presence::class)->name('app.presence');
        Route::get('/presence/{id}/show', PresenceDetail::class)->name('app.presence.show');
        Route::middleware(['role:admin'])->group(function () {
            Route::get('/presence/create', PresenceCreate::class)->name('app.presence.create');
            Route::get('/presence/{id}/edit', PresenceEdit::class)->name('app.presence.edit');
        });

        // Member
        Route::get('/member', Member::class)->name('app.member');
        Route::get('/member/{name}/{id}/show', MemberDetail::class)->name('app.member.show');
        Route::middleware(['role:admin|super-admin'])->group(function () {
            Route::get('/member/recruitment', MemberRecruitment::class)->name('app.member.recruitment');
        });

        // Division
        Route::middleware(['role:super-admin'])->group(function () {
            Route::get('/division', Division::class)->name('app.division');
            Route::middleware(['role:super-admin'])->group(function () {
                Route::get('/division/create', DivisionCreate::class)->name('app.division.create');
                Route::get('/division/{slug}/edit', DivisionEdit::class)->name('app.division.edit');
                Route::get('/division/{slug}/detail', DivisionDetail::class)->name('app.division.detail');
            });
        });

        // Report
        Route::middleware(['role:admin|super-admin'])->group(function () {
            Route::get('/report', Report::class)->name('app.report');
        });
        Route::middleware(['role:admin'])->group(function () {
            Route::get('/report/create', ReportCreate::class)->name('app.report.create');
            Route::get('/report/{date}/{id}/edit', ReportEdit::class)->name('app.report.edit');
        });


        // Profile
        Route::get('/profile', Profile::class)->name('app.profile');
        Route::get('/profile/edit', ProfileEdit::class)->name('app.profile.edit');


        Route::middleware(['role:super-admin'])->group(function () {
            Route::get('/system-points', Points::class)->name('app.system-points');
            Route::get('/system-points/letter-of-active', LetterOfActive::class)->name('app.system-points.letter-of.active');
        });

        // Logout Route
        Route::get('/logout', [Logout::class, 'logout'])->name('logout');

        // Change Password Route
        Route::get('/change-password', ChangePassword::class)->name('app.change-password');
    });
});
