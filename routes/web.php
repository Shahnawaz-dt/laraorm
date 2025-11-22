<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;





Route::get('/app', function () {
    return view('layout.app');
});

// Route::get('/tasks/index', function () {
//     return view('tasks.index');
// });

// TASK ROUTES
Route::resource('tasks', TaskController::class);

// CATEGORY ROUTES
Route::resource('categories', CategoryController::class);

// Route::resource('users', UserController::class);

Route::resource('tasks', TaskController::class);


Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');


//home route

// Home page – clean root URL
Route::get('/', function () {
    return view('layouts.home'); // ← points to resources/views/layouts/home.blade.php
})->name('home');

// Optional: also make /home work
Route::get('/home', function () {
    return redirect()->route('home');
});