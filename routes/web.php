<?php

use App\Http\Controllers\DeveloperController;
use Termwind\Components\Li;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\UsersController; 
use App\Http\Controllers\LibraryController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [UsersController::class, 'showLogin'])->name('user.login');
Route::post('/login', [UsersController::class, 'login'])->name('user.Plogin');
Route::post('/logout', [UsersController::class, 'logout'])->name('user.logout');
Route::get('/register', [UsersController::class, 'showRegister'])->name('user.register');
Route::post('/register', [UsersController::class, 'register'])->name('user.Pregister');
Route::get('/user/dashboard', [UsersController::class, 'dashboard'])->middleware('auth')->name('user.dashboard');
Route::get('/games/index', [GamesController::class, 'index']) ->name('games.index');
Route::get('/games/library', [LibraryController::class, 'showLibrary'])-> middleware('auth')->name('games.library');
Route::get('/games/{id}', [GamesController::class, 'show'])->middleware('auth')->name('games.show');
Route::post('/library/add/{game}', [LibraryController::class, 'addToLibrary'])->name('library.add');
Route::get('/library/{id}',[LibraryController::class, 'detailLibrary'])->name('library.detail');
Route::get('/library/uninstall/{id}',[LibraryController::class, 'uninstall'])->name('library.uninstall');
Route::get('/library/download/{id}', [LibraryController::class, 'markAsDownloaded'])->name('library.markdownload');
Route::get('/library/file/{id}', [LibraryController::class, 'download'])->name('library.download');
Route::get('/uap/developer', [DeveloperController::class, 'dashboard'])->middleware('auth')->name('developer.dashboard');
Route::get('/developer/login', [DeveloperController::class, 'showLogin'])->name('developer.login');
Route::post('/developer/login', [DeveloperController::class, 'login'])->name('developer.Plogin');
Route::post('/developer/logout', [DeveloperController::class, 'logout'])->name('developer.logout');
Route::get('/developer/register', [DeveloperController::class, 'showRegister'])->name('developer.register');
Route::post('/developer/register', [DeveloperController::class, 'register'])->name('developer.Pregister');


