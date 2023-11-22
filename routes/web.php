<?php

use App\Http\Controllers\HexagramController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('learn');
});

Route::get('/learn', function() {
    return view('learn');
})->name('learn');

Route::get('/play', [HexagramController::class, 'index'])->name('play');

Route::get('/asks', function() {
    return view('asks');
})->name('asks');


