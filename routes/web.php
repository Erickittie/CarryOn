<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'landing');

Route::view('/registration', 'auth.registration');

Route::view('/login', 'auth.login');

Route::view('/dashboard', 'dashboard');

Route::prefix('instructor')->group(function () {
    Route::view('create-class', 'instructor.create-class');
    Route::view('group-assignment', 'instructor.group-assignment');
    Route::view('task-ledger', 'instructor.task-ledger');
});