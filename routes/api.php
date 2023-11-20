<?php

use App\http\Controllers\UserController;
use App\http\Controllers\AddressesController;

use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class,'index']);

Route::get('addresses', [AddressController::class, 'index']);
