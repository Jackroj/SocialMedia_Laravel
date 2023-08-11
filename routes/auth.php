<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;

Route::get('/register', [AuthController::class, 'register']);

Route::post('/register', [AuthController::class, 'store'])->name('register');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/profile', [UserController::class, 'userprofile'])->middleware('auth');