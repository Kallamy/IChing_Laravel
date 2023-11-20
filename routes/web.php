<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('play');
});

Route::get('/learn', function() {
    return view('learn');
})->name('learn');

Route::get('/play', function() {
    return view('play');
})->name('play');

Route::get('/asks', function() {
    return view('asks');
})->name('asks');
