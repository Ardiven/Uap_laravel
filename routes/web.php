<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\LibraryController;

// ------------------ HOME ------------------
Route::get('/', function () {
    return view('welcome');
});

// ------------------ USER AUTH ------------------
Route::controller(UsersController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('user.login');
    Route::post('/login', 'login')->name('user.Plogin');
    Route::post('/logout', 'logout')->name('user.logout');
    Route::get('/register', 'showRegister')->name('user.register');
    Route::post('/register', 'register')->name('user.Pregister');
    Route::get('/user/dashboard', 'dashboard')->middleware('auth')->name('user.dashboard');
});

// ------------------ DEVELOPER AUTH ------------------
Route::prefix('developer')->controller(DeveloperController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('developer.login');
    Route::post('/login', 'login')->name('developer.Plogin');
    Route::post('/logout', 'logout')->name('developer.logout');
    Route::get('/register', 'showRegister')->name('developer.register');
    Route::post('/register', 'register')->name('developer.Pregister');
    Route::get('/dashboard', 'dashboard')->middleware('auth:developer')->name('developer.dashboard');
    Route::post('/dashboard', 'update')->middleware('auth:developer')->name('developer.profile.update');
});

// ------------------ GAMES ------------------
Route::controller(GamesController::class)->group(function () {
    Route::get('/games/index', 'index')->name('games.index');
    Route::get('/games/{id}', [GamesController::class, 'show'])
    ->where('id', '[0-9]+') // hanya terima angka
    ->name('games.show');
});

// ------------------ LIBRARY ------------------
Route::controller(LibraryController::class)->group(function () {
    Route::get('/library', 'showLibrary')->middleware('auth')->name('library');
    Route::post('/library/add/{game}', 'addToLibrary')->name('library.add');
    Route::get('/library/{id}', 'detailLibrary')->name('library.detail');
    Route::get('/library/uninstall/{id}', 'uninstall')->name('library.uninstall');
    Route::get('/library/download/{id}', 'markAsDownloaded')->name('library.markdownload');
    Route::get('/library/file/{id}', 'download')->name('library.download');
});
