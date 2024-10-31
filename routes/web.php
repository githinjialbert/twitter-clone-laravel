<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\AuthController;


Route::get('/dashboard', [DashboardController::class , 'index'])->name('dashboard');

Route::post('/idea', [IdeaController::class , 'store'])->name('idea.store');

Route::get('/idea/{idea}', [IdeaController::class , 'show'])->name('idea.show');

Route::delete('/idea/{idea}', [IdeaController::class , 'destroy'])->name('idea.destroy');

Route::get('idea/{idea}/edit', [IdeaController::class, 'edit'])->name('idea.edit');

Route::put('idea/{idea}', [IdeaController::class, 'update'])->name('idea.update');

Route::post('idea/{idea}/comments', [CommentsController::class, 'store'])->name('idea.comments.store');

Route::get('register', [AuthController::class, 'register'])->name('register');

Route::post('register', [AuthController::class, 'store']);

Route::get('login', [AuthController::class, 'login'])->name('login');

Route::post('login', [AuthController::class, 'authenticate']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/terms', function () {
    return view('terms');
});
