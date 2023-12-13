<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\post\PostController;
use App\Http\Controllers\admin\post\AcceptPostController;

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

// Auth routes
Route::group(['prefix' => 'auth'], function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/login', [LoginController::class, 'create'])->name('login.index');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
    Route::post('/logout', LogoutController::class)->name('logout');
});

// Post routes
Route::resource('/post', PostController::class);
Route::patch('/post/{post}/accept', [AcceptPostController::class, '__invoke'])->name('post.accept');

Route::middleware(['auth'])->group(function () {
    // DashboardController
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
});



// User routes
// Route::get('/posts/user', [UserController::class, 'showPost']);

// User list
