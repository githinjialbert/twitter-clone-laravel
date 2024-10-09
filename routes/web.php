<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;

Route::get('/dashboard', [DashboardController::class , 'index'])->name('dashboard');

Route::post('/idea', [IdeaController::class , 'store'])->name('idea.create');

Route::get('/idea/{idea}', [IdeaController::class , 'show'])->name('idea.show');

Route::delete('/idea/{idea}', [IdeaController::class , 'destroy'])->name('idea.destroy');

Route::get('/terms', function () {
    return view('terms');
});
