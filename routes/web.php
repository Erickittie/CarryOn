<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'landing');

Route::view('/registration', 'auth.registration');

Route::view('/login', 'auth.login');