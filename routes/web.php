<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\UserController;

Route::get('/', [FilmController::class, 'index']);
Route::get('/filters', [FilmController::class, 'filters'])->name('filters');
Route::get('/single/{f_id}', [FilmController::class, 'single'])->name('single-one');
Route::get('/searchname', [FilmController::class, 'searchName'])->name('searchname');
Route::get('/searchfilter', [FilmController::class, 'searchFilter'])->name('searchfilter');
Route::get('/actors/{a_id}', [ActorController::class, 'actorsOne'])->name('actors-one');

Route::resource('image', 'CRUDController');

Route::get('/info', [AdminController::class, 'index'])->middleware('can:isAdmin');
Route::get('/info/create', [AdminController::class, 'create'])->middleware('can:isAdmin')->name('info.create');
Route::post('/info', [AdminController::class, 'store'])->middleware('can:isAdmin')->name('info.store');
Route::get('/info/{info}', [AdminController::class, 'show'])->middleware('can:isAdmin');
Route::get('/info/{info}/edit', [AdminController::class, 'edit'])->middleware('can:isAdmin')->name('info.edit');
Route::patch('/info/{info}', [AdminController::class, 'update'])->middleware('can:isAdmin')->name('info.update');
Route::delete('/info/{info}', [AdminController::class, 'destroy'])->middleware('can:isAdmin')->name('info.destroy');
Route::get('/logout', [UserController::class, 'destroy']);

Auth::routes();

Route::get('/chats', [ChatController::class, 'index']);
Route::get('/messages', [ChatController::class, 'fetchAllMessages']);
Route::post('/messages', [ChatController::class, 'sendMessage']);
Route::get('/home', [UserController::class, 'index'])->name('home');
Route::post('rating/{f_id}', [FilmController::class, 'rating'])->middleware('auth')->name('rating');
Route::get('chartjs', [AdminController::class, 'chart'])->middleware('can:isAdmin')->name('chart');
