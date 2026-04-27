<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/',           [PageController::class, 'showLogin'])->name('login');
Route::post('/login',     [PageController::class, 'login'])->name('login.post');
Route::get('/dashboard',  [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/pengelolaan',[PageController::class, 'pengelolaan'])->name('pengelolaan');
Route::get('/profile',    [PageController::class, 'profile'])->name('profile');
Route::get('/logout',     [PageController::class, 'logout'])->name('logout');