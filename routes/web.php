<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/app', function () {
    return view('layout.app');
});

// TASK ROUTES
Route::resource('tasks', TaskController::class);

// CATEGORY ROUTES
Route::resource('categories', CategoryController::class);
