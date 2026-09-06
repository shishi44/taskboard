<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('projects', ProjectController::class);

Route::resource('projects.tasks', TaskController::class)
    ->only(['create', 'store']);

Route::resource('tasks', TaskController::class)
    ->only(['edit', 'update', 'destroy']);