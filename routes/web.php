<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get(
        '/register',
        [RegisterController::class, 'create']
    )->name('register');

    Route::post(
        '/register',
        [RegisterController::class, 'store']
    )->name('register.store');


    Route::get(
        '/login',
        [LoginController::class, 'create']
    )->name('login');

    Route::post(
        '/login',
        [LoginController::class, 'store']
    )->name('login.store');

});


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get(
        '/',
        [DashboardController::class, 'index']
    )->name('dashboard');


    Route::resource(
        'projects',
        ProjectController::class
    );


    Route::resource(
        'projects.tasks',
        TaskController::class
    )->only([
        'create',
        'store',
    ]);


    Route::resource(
        'tasks',
        TaskController::class
    )->only([
        'edit',
        'update',
        'destroy',
    ]);


    Route::post(
        '/logout',
        LogoutController::class
    )->name('logout');

});