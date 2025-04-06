<?php

use Termwind\Components\Li;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\UsersController; 
use App\Http\Controllers\LibraryController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [UsersController::class, 'showLogin'])->name('login');
Route::post('/login', [UsersController::class, 'login']);
Route::get('/register', [UsersController::class, 'showRegister'])->name('register');
Route::post('/register', [UsersController::class, 'register']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');
Route::get('/games/index', [GamesController::class, 'index']) ->name('games.index');
Route::get('/games/library', [LibraryController::class, 'showLibrary'])-> middleware('auth')->name('games.library');
