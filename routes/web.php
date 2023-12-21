<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\PdfController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\user\BookmarkController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\post\PostController;
use App\Http\Controllers\admin\StatistikController;
use App\Http\Controllers\admin\post\SubmitPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// HomeController
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login.index');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
    Route::get('/register', [RegisterController::class, 'create'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/auth/redirect', [LoginController::class, 'redirectToProvider'])->name('login.redirect');
    Route::get('/auth/callback', [LoginController::class, 'handleProviderCallback'])->name('login.callback');
});


Route::middleware(['auth', 'not_only_student'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/print/{period}', PdfController::class)->name('dashboard.print');
    Route::get('dashboard/users', [UsersController::class, 'index'])->name('users.index');
    Route::post('dashboard/users', [UsersController::class, 'update'])->name('users.update');
    Route::resource('dashboard/post', PostController::class)->except('show');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('dashboard/submit', [SubmitPostController::class, 'index'])->name('submit.index');
    Route::patch('dashboard/submit/{post}', [SubmitPostController::class, 'update'])->name('submit.update');
    Route::patch('dashboard/submit', [SubmitPostController::class, 'updateAll'])->name('submit.update.all');
    Route::get('/dashboard/statistik', StatistikController::class)->name('dashboard.statistik');
});

Route::middleware(['is_published', 'auth'])->group(function () {
    Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', LogoutController::class)->name('logout');
    Route::get('/bookmark', [BookmarkController::class, 'index'])->name('bookmark.index');
    Route::post('/bookmark/{post}', [BookmarkController::class, 'store'])->name('bookmark.store');
    Route::delete('/bookmark/{post}', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');
});
