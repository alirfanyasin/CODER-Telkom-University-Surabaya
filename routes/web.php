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

Route::middleware(['guest'])->group(function () {
    // Auth Route
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');
    Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');

    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');
});

Route::middleware(['auth'])->group(function () {

    Route::group(['prefix' => '/app', 'as' => 'app.'], function () {
        Route::get('/', Dashboard::class)->name('dashboard');

        // E-Learning
        Route::group(['prefix' => '/e-learning', 'as' => 'e-learning.'], function () {

            // Tugas
            Route::group(['prefix' => '/task'], function () {
                Route::get('/', Task::class)->name('task'); // Dipisah karna Task tidak punya route index

                Route::group(['as' => 'task.'], function () {
                    Route::get('/{slug}/detail', TaskDetail::class)->name('detail');

                    Route::middleware(['role:admin'])->group(function () {
                        Route::get('/create', TaskCreate::class)->name('create');
                        Route::get('/{slug}/edit', TaskEdit::class)->name('edit');
                        Route::get('/{slug}/show-answer', TaskSubmissionShowAnswer::class)->name('show-answer');
                    });
                    Route::middleware(['role:user'])->group(function () {
                        Route::get('/{slug}/submission', TaskSubmission::class)->name('submission');
                        Route::get('/{slug}/submission/edit', TaskSubmissionEdit::class)->name('submission.edit');
                        Route::get('/{slug}/show-score', TaskSubmission::class)->name('show-score');
                    });
                });
            });

            // Meeting
            Route::group(['prefix' => '/meeting'], function () {
                Route::get('/', Meeting::class)->name('meeting'); // Dipisah karna Meeting tidak punya route index

                Route::group(['as' => 'meeting.'], function () {

                    Route::get('/{id}/show', MeetingDetail::class)->name('show');
                    Route::middleware(['role:admin'])->group(function () {
                        Route::get('/create', MeetingCreate::class)->name('create');
                        Route::get('/{id}/edit', MeetingEdit::class)->name('edit');
                    });
                });
            });

            // Modul
            Route::group(['prefix' => '/modul'], function () {
                Route::get('/', Modul::class)->name('modul'); // Dipisah karna Modul tidak punya route index

                Route::group(['as' => 'modul.', 'middleware' => ['role:admin']], function () {
                    Route::get('/create', ModulCreate::class)->name('create');
                    Route::get('/{id}/edit', ModulEdit::class)->name('edit');
                    // Route::get('/{id}/destroy', ModulEdit::class)->name('destroy');
                });
            });

            // Kuis
            Route::group(['prefix' => '/quiz', 'middleware' => ['role:admin|user']], function () {
                Route::get('/', Quiz::class)->name('quiz'); // Dipisah karna Quiz tidak punya route index

                // Dikeluarkan karena nama route tidak konsisten
                Route::middleware(['role:user'])->group(function () {
                    Route::get('/{code}/{slug}/confirmation', QuizConfirmation::class)->name('quiz-confirmation');
                    Route::get('/{slug}/{id}/live', QuizLive::class)->name('quiz-live');
                    Route::get('/{id}/result', QuizResult::class)->name('quiz-result');
                });

                Route::group(['as' => 'quiz.', 'middleware' => ['role:admin']], function () {
                    Route::get('/{code}/{id}/show', QuizShow::class)->name('show');
                    Route::get('/{code}/{id}/submission', QuizSubmission::class)->name('submission');
                    Route::get('/create', QuizCreate::class)->name('create');
                    Route::get('/question/create', QuizQuestionCreate::class)->name('question-create');
                    Route::get('/answer-key/create', QuizAnswerKey::class)->name('answere-key-create');
                    Route::get('/{code}/{id}/edit', QuizEdit::class)->name('edit');
                });
            });
        });

        // Content Gallegry & Article
        Route::group(['prefix' => '/content', 'as' => 'content.'], function () {

            // Gallery
            Route::middleware(['role:super-admin'])->group(function () {
                Route::get('/gallery', AppGallery::class)->name('gallery');
                Route::get("/gallery/{id}/edit", AppGalleryEdit::class)->name('gallery.edit');
                Route::get("/gallery/create", AppGalleryCreate::class)->name('gallery.create');
            });

            // Article
            Route::get('/article', AppArticle::class)->name('article');
            Route::get('/article/create', ArticleCreate::class)->name('article.create');
            Route::get('/article/edit', ArticleEdit::class)->name('article.edit');
            Route::get('/article/{slug}', AppArticle::class)->name('article.detail');
        });

        // Event
        Route::group(['prefix' => '/event', 'as' => 'event.'], function () {
            Route::get('/management-event', ManagementEvent::class)->name('management-event');
            Route::get('/management-event/show', ManagementEventDetail::class)->name('management-event.show');
            Route::get('/reqrutment', Reqrutment::class)->name('reqrutment');
        });

        // Presence
        Route::group(['prefix' => '/presence'], function () {
            Route::get('/', Presence::class)->name('presence'); // Dipisah karna Presence tidak punya route index

            Route::group(['as' => 'presence.'], function () {
                Route::get('/{id}/show', PresenceDetail::class)->name('show');
                Route::middleware(['role:admin'])->group(function () {
                    Route::get('/create', PresenceCreate::class)->name('create');
                    Route::get('/{id}/edit', PresenceEdit::class)->name('edit');
                });
            });
        });

        // Member
        Route::group(['prefix' => '/member'], function () {
            Route::get('/', Member::class)->name('member'); // Dipisah karna Member tidak punya route index

            Route::get('/{name}/{id}/show', MemberDetail::class)->name('member.show');
            Route::middleware(['role:admin|super-admin'])->group(function () {
                Route::get('/recruitment', MemberRecruitment::class)->name('member.recruitment');
            });
        });

        // Division
        Route::group(['prefix' => '/division', 'middleware' => ['role:super-admin']], function () {
            Route::get('/', Division::class)->name('division');
            Route::get('/create', DivisionCreate::class)->name('division.create');
            Route::get('/{slug}/edit', DivisionEdit::class)->name('division.edit');
            Route::get('/{slug}/detail', DivisionDetail::class)->name('division.detail');
        });

        // Report
        Route::group(['prefix' => '/report', 'middleware' => ['role:admin|super-admin']], function () {
            Route::get('/', Report::class)->name('report');
            Route::middleware(['role:admin'])->group(function () {
                Route::get('/create', ReportCreate::class)->name('report.create');
                Route::get('/{date}/{id}/edit', ReportEdit::class)->name('report.edit');
            });
        });

        // Profile
        Route::get('/profile', Profile::class)->name('profile');
        Route::get('/profile/edit', ProfileEdit::class)->name('profile.edit');


        Route::middleware(['role:super-admin'])->group(function () {
            Route::get('/system-points', Points::class)->name('system-points');
            Route::get('/system-points/letter-of-active', LetterOfActive::class)->name('system-points.letter-of.active');
        });

        // Change Password Route
        Route::get('/change-password', ChangePassword::class)->name('change-password');
    });

    // Logout Route
    Route::get('app/logout', [Logout::class, 'logout'])->name('logout');
});
