<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentsController;


Route::get('/dashboard', [DashboardController::class , 'index'])->name('dashboard');

Route::post('/idea', [IdeaController::class , 'store'])->name('idea.store');

Route::get('/idea/{idea}', [IdeaController::class , 'show'])->name('idea.show');

Route::delete('/idea/{idea}', [IdeaController::class , 'destroy'])->name('idea.destroy');

Route::get('idea/{idea}/edit', [IdeaController::class, 'edit'])->name('idea.edit');

Route::put('idea/{idea}', [IdeaController::class, 'update'])->name('idea.update');

Route::post('idea/{idea}/comments', [CommentsController::class, 'store'])->name('idea.comments.store');

Route::get('/terms', function () {
    return view('terms');
});
