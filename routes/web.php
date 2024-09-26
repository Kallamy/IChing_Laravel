<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LearnController;
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

Route::get('/signin', [AuthController::class, 'showSigninForm'])->name('signin');
Route::post('/signin', [AuthController::class, 'signin']);
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);


