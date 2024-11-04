<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\UserController;

Route::get('dashboard', [DashboardController::class , 'index'])->name('dashboard');

Route::resource('idea', IdeaController::class)->except('create', 'index', 'show')->middleware('auth');

Route::resource('idea', IdeaController::class)->only('show');

Route::resource('idea.comments', CommentsController::class)->only(['store'])->middleware('auth');

Route::resource('users', UserController::class)->only('show', 'edit', 'update')->middleware('auth');

Route::get('profile', [UserController::class, 'p_updates'])->middleware('auth')->name('profile');

Route::get('/terms', function () {
    return view('terms');
});
