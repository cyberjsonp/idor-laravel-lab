<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Challenges\ChallengeIndexController;
use App\Http\Controllers\Challenges\Challenge01Controller;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/challenges', [ChallengeIndexController::class, 'index'])->name('challenges.index');
    Route::get('/challenges/1', [Challenge01Controller::class, 'index'])->name('challenges.01');
});
