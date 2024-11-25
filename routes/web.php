<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

Route::get('lang/{lang}', function($lang) {
    app()->setLocale($lang);

    session()->put('locale', $lang);

    return redirect()->route('dashboard');
})->name('lang');

Route::get('dashboard', [DashboardController::class , 'index'])->name('dashboard');

Route::resource('idea', IdeaController::class)->except('create', 'index', 'show')->middleware('auth');

Route::resource('idea', IdeaController::class)->only('show');

Route::resource('idea.comments', CommentsController::class)->only(['store'])->middleware('auth');

Route::resource('users', UserController::class)->only('show');

Route::resource('users', UserController::class)->only('edit', 'update')->middleware('auth');

Route::get('profile', [UserController::class, 'p_updates'])->middleware('auth')->name('profile');

Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');

Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');

Route::post('ideas/{idea}/like', [IdeaLikeController::class, 'like'])->middleware('auth')->name('ideas.like');

Route::post('ideas/{idea}/unlike', [IdeaLikeController::class, 'unlike'])->middleware('auth')->name('ideas.unlike');

Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/admin', [AdminDashboardController::class, 'index'])->middleware(['auth'])->name('admin.dashboard');
