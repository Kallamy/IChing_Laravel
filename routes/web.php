<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LearnController;
use App\Http\Controllers\AskController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LearnController::class, 'history'])->name('learn.history');

Route::prefix('learn')->group(function() {
    Route::get('/', [LearnController::class, 'history'])->name('learn');
    Route::get('/history', [LearnController::class, 'history'])->name('learn.history');
    Route::get('/about', [LearnController::class, 'about'])->name('learn.about');
    Route::get('/trigrams', [LearnController::class, 'trigrams'])->name('learn.trigrams');
    Route::get('/hexagrams', [LearnController::class, 'hexagrams'])->name('learn.hexagrams');
});

Route::get('/play', function() {
    return view('play');
})->name('play');

Route::get('/asks', function() {
    return view('asks');
})->name('asks');

Route::get('/setLanguage/{lang}', [LanguageController::class, 'setLang'])->name('setLang');;

Route::get('/login', [AuthController::class, 'showSigninForm'])->name('signin');
Route::post('/login', [AuthController::class, 'signin']);
Route::get('/new', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/new', [AuthController::class, 'signup']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/save', [AskController::class, 'save'])->name('save');

